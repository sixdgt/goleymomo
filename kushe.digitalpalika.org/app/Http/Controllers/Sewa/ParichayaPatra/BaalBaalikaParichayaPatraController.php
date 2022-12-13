<?php

namespace App\Http\Controllers\Sewa\ParichayaPatra;

use App\Http\Controllers\Controller;
use App\Models\Sewa\ParichayaPatra\BaalBaalikaParichayapatra;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DataTables;

class BaalBaalikaParichayaPatraController extends Controller
{
    /**
     * Constructor.

     *
     * @return \Illuminate\Http\Response
     */

    private $messages = [
        'required' => 'यो क्षेत्र आवश्यक छ।',
        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
        'integer'=> 'यो फिल्ड अंक हुनुपर्छ'
    ];

    public $rules = [
        'first_name' => 'required|string|max:191',
        'last_name' => 'required|string|max:191',

        'address_pradesh' => 'required|string|max:191',
        'address_jilla' => 'required|string|max:191',
        'address_palika' => 'required|string|max:191',
        'address_ward_no' => 'required|integer|max:100',
        'address_tol' => 'required|string|max:191',


        'father_first_name' => 'required|string|max:191',
        'father_last_name' => 'required|string|max:191',

        'mother_first_name' => 'required|string|max:191',
        'mother_last_name' => 'required|string|max:191',


        'grand_father_first_name' => 'required|string|max:191',
        'grand_father_last_name' => 'required|string|max:191',

        'dob' => 'required|string|max:191',
        'gender'=> 'required|string|in:"पुरुष","महिला","तेश्रो लिङ्गी"'
//            'picture' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
//            'citizenship' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
    ];


    function __construct(){
        $this->middleware('permission:baalbaalika-list|baalbaalika-create|baalbaalika-edit|baalbaalika-delete', ['only' => ['index','store']]);
        $this->middleware('permission:baalbaalika-create', ['only' => ['create','store']]);
        $this->middleware('permission:baalbaalika-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:baalbaalika-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if($request->ajax()){
            $data = BaalBaalikaParichayapatra::all();
//            $data =
//                array(
//                [
//                    'id'=>'1',
//                    'first_name'=>'fasd',
//                    'middle_name'=>'fasd',
//                    'last_name'=>'dfasf',
//                    'father_name'=>'fdsafa',
//                    'mother_name'=>'fdsafas',
//                    'grand_father_name'=>'fdsafa',
//                    'gender'=>'male',
//                    'dob'=>'2002/02/02',
//                    'contact'=>'9843692514',
//                    'marital_status'=>'not ',
//                    'picture'=>'fdasf',
//                    'citizenship'=>'fdasfads'
//                ]
//
//            );
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.url("sewa/parichaya-patra/baalbaalika/".$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editYojana" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.url("sewa/parichaya-patra/baalbaalika/".$row['id']."/edit").'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editYojana" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteBaalbaalikaParichayaPatra"><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('sewa.parichayapatra.baalbaalika.index');
    }

    function create(Request $request){
        return view('sewa.parichayapatra.baalbaalika.create');
    }

    function store(Request $request){



        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }



        $balbalika = new BaalBaalikaParichayapatra();
        if($request->session()->has('baalbaalika_profile_picture') && $request->session()->has('baalbaalika_birth_certificate'))
        {
            $file_name_baalbaalika_profile_picture=$request->session()->get('baalbaalika_profile_picture');
            File::move(storage_path('app/files/temp-files/'.$file_name_baalbaalika_profile_picture), public_path('files/parichayapatra/baalbaalika/profile/'.$file_name_baalbaalika_profile_picture));
            $balbalika->baalbaalika_profile_picture='files/parichayapatra/baalbaalika/profile/'.$file_name_baalbaalika_profile_picture;
            $request->session()->forget('baalbaalika_profile_picture');


            $file_name_baalbaalika_birth_certificate=$request->session()->get('baalbaalika_birth_certificate');
            File::move(storage_path('app/files/temp-files/'.$file_name_baalbaalika_birth_certificate), public_path('files/parichayapatra/baalbaalika/birth_certificate/'.$file_name_baalbaalika_birth_certificate));
            $balbalika->baalbaalika_birth_certificate='files/parichayapatra/baalbaalika/birth_certificate/'.$file_name_baalbaalika_birth_certificate;
            $request->session()->forget('baalbaalika_birth_certificate');
        }
        else{
            return Redirect::back()->withErrors(['baalbaalika_birth_certificate'=> 'Please select the file'])->withInput();
        }

        $balbalika->first_name = $request->first_name;
        $balbalika->middle_name = $request->middle_name;
        $balbalika->last_name = $request->last_name;


        $balbalika->address_pradesh  = $request->address_pradesh;
        $balbalika->address_jilla  = $request->address_jilla;
        $balbalika->address_palika  = $request->address_palika;
        $balbalika->address_ward_no  = $request->address_ward_no;
        $balbalika->address_tol  = $request->address_tol;


        $balbalika->father_first_name=$request->father_first_name;
        $balbalika->father_middle_name=$request->father_middle_name;
        $balbalika->father_last_name=$request->father_last_name;


        $balbalika->mother_first_name=$request->mother_first_name;
        $balbalika->mother_middle_name=$request->mother_middle_name;
        $balbalika->mother_last_name=$request->mother_last_name;


        $balbalika->grand_father_first_name=$request->grand_father_first_name;
        $balbalika->grand_father_middle_name=$request->grand_father_middle_name;
        $balbalika->grand_father_last_name=$request->grand_father_last_name;



        $balbalika->dob = $request->dob;
        $balbalika->gender = $request->gender;

        $query =$balbalika->save();

        if(!$query){
//            return back()->with('fail' , 'Opss! something went wrong');
            echo "dfas";
        }else{
            return redirect()->route('baalbaalika.index')->with('success' , 'Successfully Added');
        }


    }

    function edit($id){
        $baalBaalikaParichayapatra=BaalBaalikaParichayapatra::where('id','=',$id)->get()->first();
//        dd($baalBaalikaParichayapatra);
        return view('sewa.parichayapatra.baalbaalika.edit',compact('baalBaalikaParichayapatra'));
    }

    function update(Request $request,$id)
    {

        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }



        $balbalika = BaalBaalikaParichayapatra::where('id','=',$id)->get()->first();
        if($request->session()->has('baalbaalika_profile_picture') && $request->session()->has('baalbaalika_birth_certificate'))
        {
            //delete olf file and save new file
            File::delete(public_path($balbalika->baalbaalika_profile_picture));
            $file_name_baalbaalika_profile_picture=$request->session()->get('baalbaalika_profile_picture');
            File::move(storage_path('app/files/temp-files/'.$file_name_baalbaalika_profile_picture), public_path('files/parichayapatra/baalbaalika/profile/'.$file_name_baalbaalika_profile_picture));
            $balbalika->baalbaalika_profile_picture='files/parichayapatra/baalbaalika/profile/'.$file_name_baalbaalika_profile_picture;
            $request->session()->forget('baalbaalika_profile_picture');
            //delete old file and save new file
            File::delete(public_path($balbalika->baalbaalika_birth_certificate));
            $file_name_baalbaalika_birth_certificate=$request->session()->get('baalbaalika_birth_certificate');
            File::move(storage_path('app/files/temp-files/'.$file_name_baalbaalika_birth_certificate), public_path('files/parichayapatra/baalbaalika/birth_certificate/'.$file_name_baalbaalika_birth_certificate));
            $balbalika->baalbaalika_birth_certificate='files/parichayapatra/baalbaalika/birth_certificate/'.$file_name_baalbaalika_birth_certificate;
            $request->session()->forget('baalbaalika_birth_certificate');
        }


        $balbalika->first_name = $request->first_name;
        $balbalika->middle_name = $request->middle_name;
        $balbalika->last_name = $request->last_name;


        $balbalika->address_pradesh  = $request->address_pradesh;
        $balbalika->address_jilla  = $request->address_jilla;
        $balbalika->address_palika  = $request->address_palika;
        $balbalika->address_ward_no  = $request->address_ward_no;
        $balbalika->address_tol  = $request->address_tol;

        $balbalika->father_first_name=$request->father_first_name;
        $balbalika->father_middle_name=$request->father_middle_name;
        $balbalika->father_last_name=$request->father_last_name;


        $balbalika->mother_first_name=$request->mother_first_name;
        $balbalika->mother_middle_name=$request->mother_middle_name;
        $balbalika->mother_last_name=$request->mother_last_name;


        $balbalika->grand_father_first_name=$request->grand_father_first_name;
        $balbalika->grand_father_middle_name=$request->grand_father_middle_name;
        $balbalika->grand_father_last_name=$request->grand_father_last_name;



        $balbalika->dob = $request->dob;
        $balbalika->gender = $request->gender;

        $query =$balbalika->save();

        if(!$query){
//            return back()->with('fail' , 'Opss! something went wrong');
            echo "dfas";
        }else{
            return redirect()->route('baalbaalika.index')->with('success' , 'Successfully Added');
        }

    }

    function show($id)
    {
        $baalBaalikaParichayapatra=BaalBaalikaParichayapatra::where('id','=',$id)->get()->first();
        return view('sewa.parichayapatra.baalbaalika.show',compact('baalBaalikaParichayapatra'));
    }

    function destroy($id){
        return (BaalBaalikaParichayapatra::find($id)->delete($id)) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'Data has been deleted'
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'Something went wrong'
                ]
            );
    }


    public function createPdfBaalbaalikaParichayaPatra($id)
    {
        $baalBaalikaParichayapatra=BaalBaalikaParichayapatra::where('id','=',$id)->get()->first();
        $pdf = SnappyPdf::loadView('sewa.parichayapatra.baalbaalika.parichayapatra_doc',compact('baalBaalikaParichayapatra'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
//    $pdf->setOption('no-outline', true);
        $pdf->setOption('page-size','A5');
        $pdf->setOption('margin-left','0');
        $pdf->setOption('margin-top','10mm');
        $pdf->setOption('margin-bottom','0');
        $pdf->setOption('orientation', 'landscape');
        $pdf->setOption('page-height','1000');
        return $pdf->stream();
    }

    public function createDefaultBaalbaalikaParichayaPatra($id)
    {
        $baalBaalikaParichayapatra=BaalBaalikaParichayapatra::where('id','=',$id)->get()->first();

        return view('sewa.parichayapatra.baalbaalika.parichayapatra_doc',compact('baalBaalikaParichayapatra'));

    }
}
