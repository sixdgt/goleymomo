<?php

namespace App\Http\Controllers\Sewa\ParichayaPatra;

use App\Http\Controllers\Controller;
use App\Models\Sewa\ParichayaPatra\MahilaParichayapatra;
use Barryvdh\DomPDF\Facade\Pdf;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DataTables;

class MahilaParichayaPatraController extends Controller
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
        'marital_status' => 'required|max:191|in:"विवाहीत", "अविवाहीत","विधवा"',
        'contact' => 'required|max:191',
//            'picture' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
//            'citizenship' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
    ];

    function __construct(){
        $this->middleware('permission:mahila-list|mahila-create|mahila-edit|mahila-delete', ['only' => ['index','store']]);
        $this->middleware('permission:mahila-create', ['only' => ['create','store']]);
        $this->middleware('permission:mahila-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:mahila-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if($request->ajax()){
//            $data = MahilaParichayapatra::all();
            $data = MahilaParichayapatra::all();
//                array(
//                [
//                    'id'=>'1',
//                    'first_name'=>'fasd',
//                    'middle_name'=>'fasd',
//                    'last_name'=>'dfasf',
//
//                    'father_first_name'=>'fasd',
//                    'father_middle_name'=>'fasd',
//                    'father_last_name'=>'dfasf',
//
//                    'mother_first_name'=>'fasd',
//                    'mother_middle_name'=>'fasd',
//                    'mother_last_name'=>'dfasf',
//
//                    'grand_father_first_name'=>'fasd',
//                    'grand_father_middle_name'=>'fasd',
//                    'grand_father_last_name'=>'dfasf',
//
//                    'husband_first_name'=>'fasd',
//                    'husband_middle_name'=>'fasd',
//                    'husband_last_name'=>'dfasf',
//
//
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
                    <a href="'.url("sewa/parichaya-patra/mahila/".$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editMahilaParichayaPatra" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.url("sewa/parichaya-patra/mahila/".$row['id']."/edit").'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="" ><i class="fa fa-pencil"></i></a>
                    <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteMahilaParichayaPatra"><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('sewa.parichayapatra.mahila.index');
    }

    function store(Request $request){
//        dd($request);

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


        $mahila = new MahilaParichayapatra();
        if($request->session()->has('mahila_profile_picture') && $request->session()->has('mahila_citizenship'))
        {
            $file_name_mahila_profile_picture=$request->session()->get('mahila_profile_picture');
            File::move(storage_path('app/files/temp-files/'.$file_name_mahila_profile_picture), public_path('files/parichayapatra/mahila/profile/'.$file_name_mahila_profile_picture));
            $mahila->mahila_profile_picture='files/parichayapatra/mahila/profile/'.$file_name_mahila_profile_picture;
            $request->session()->forget('mahila_profile_picture');


            $file_name_mahila_citizenship=$request->session()->get('mahila_citizenship');
            File::move(storage_path('app/files/temp-files/'.$file_name_mahila_citizenship), public_path('files/parichayapatra/mahila/citizenship/'.$file_name_mahila_citizenship));
            $mahila->mahila_citizenship='files/parichayapatra/mahila/citizenship/'.$file_name_mahila_citizenship;
            $request->session()->forget('mahila_citizenship');

        }
        else{
            return Redirect::back()->withErrors(['mahila_profile_picture'=> 'Please select the file'])->withInput();
        }


        $mahila->first_name = $request->first_name;
        $mahila->middle_name = $request->middle_name;
        $mahila->last_name = $request->last_name;


        $mahila->address_pradesh  = $request->address_pradesh;
        $mahila->address_jilla  = $request->address_jilla;
        $mahila->address_palika  = $request->address_palika;
        $mahila->address_ward_no  = $request->address_ward_no;
        $mahila->address_tol  = $request->address_tol;


        $mahila->father_first_name=$request->father_first_name;
        $mahila->father_middle_name=$request->father_middle_name;
        $mahila->father_last_name=$request->father_last_name;


        $mahila->mother_first_name=$request->mother_first_name;
        $mahila->mother_middle_name=$request->mother_middle_name;
        $mahila->mother_last_name=$request->mother_last_name;


        $mahila->grand_father_first_name=$request->grand_father_first_name;
        $mahila->grand_father_middle_name=$request->grand_father_middle_name;
        $mahila->grand_father_last_name=$request->grand_father_last_name;

        $mahila->husband_first_name=$request->husband_first_name;
        $mahila->husband_middle_name=$request->husband_middle_name;
        $mahila->husband_last_name=$request->husband_last_name;

        $mahila->dob = $request->dob;
        $mahila->marital_status = $request->marital_status;
        $mahila->contact = $request->contact;
        $query =$mahila->save();

        if(!$query){
//            return back()->with('fail' , 'Opss! something went wrong');
            echo "dfas";
        }else{
            return redirect()->route('mahila.index')->with('success' , 'Successfully Added');
        }

    }

    function create(Request $request){
        return view('sewa.parichayapatra.mahila.create');
    }

    function edit($id){
        $mahilaParichayapatra=MahilaParichayapatra::where('id','=',$id)->get()->first();
        return view('sewa.parichayapatra.mahila.edit',compact('mahilaParichayapatra'));
    }

    function update(Request $request, $id)
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


        $mahila = MahilaParichayapatra::where('id','=',$id)->get()->first();
        if($request->session()->has('mahila_profile_picture') && $request->session()->has('mahila_citizenship'))
        {
            //delete the old file and add new file
            File::delete(public_path($mahila->mahila_profile_picture));
            $file_name_mahila_profile_picture=$request->session()->get('mahila_profile_picture');
            File::move(storage_path('app/files/temp-files/'.$file_name_mahila_profile_picture), public_path('files/parichayapatra/mahila/profile/'.$file_name_mahila_profile_picture));
            $mahila->mahila_profile_picture='files/parichayapatra/mahila/profile/'.$file_name_mahila_profile_picture;
            $request->session()->forget('mahila_profile_picture');

            //delete the old file and add new file
            File::delete(public_path($mahila->mahila_citizenship));
            $file_name_mahila_citizenship=$request->session()->get('mahila_citizenship');
            File::move(storage_path('app/files/temp-files/'.$file_name_mahila_citizenship), public_path('files/parichayapatra/mahila/citizenship/'.$file_name_mahila_citizenship));
            $mahila->mahila_citizenship='files/parichayapatra/mahila/citizenship/'.$file_name_mahila_citizenship;
            $request->session()->forget('mahila_citizenship');

        }



        $mahila->first_name = $request->first_name;
        $mahila->middle_name = $request->middle_name;
        $mahila->last_name = $request->last_name;


        $mahila->address_pradesh  = $request->address_pradesh;
        $mahila->address_jilla  = $request->address_jilla;
        $mahila->address_palika  = $request->address_palika;
        $mahila->address_ward_no  = $request->address_ward_no;
        $mahila->address_tol  = $request->address_tol;



        $mahila->father_first_name=$request->father_first_name;
        $mahila->father_middle_name=$request->father_middle_name;
        $mahila->father_last_name=$request->father_last_name;


        $mahila->mother_first_name=$request->mother_first_name;
        $mahila->mother_middle_name=$request->mother_middle_name;
        $mahila->mother_last_name=$request->mother_last_name;


        $mahila->grand_father_first_name=$request->grand_father_first_name;
        $mahila->grand_father_middle_name=$request->grand_father_middle_name;
        $mahila->grand_father_last_name=$request->grand_father_last_name;

        $mahila->husband_first_name=$request->husband_first_name;
        $mahila->husband_middle_name=$request->husband_middle_name;
        $mahila->husband_last_name=$request->husband_last_name;

        $mahila->dob = $request->dob;
        $mahila->marital_status = $request->marital_status;
        $mahila->contact = $request->contact;
//        dd($mahila);
        $query =$mahila->save();
//
        if(!$query){
            return back()->with('fail' , 'Opss! something went wrong');

        }else{
            return redirect()->route('mahila.index')->with('success' , 'Successfully Added');
        }
    }

    function destroy($id){
        return (MahilaParichayapatra::find($id)->delete($id)) ?
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

    function show($id)
    {
        $mahilaParichayapatra=MahilaParichayapatra::where('id','=',$id)->get()->first();
        return view('sewa.parichayapatra.mahila.show',compact('mahilaParichayapatra'));
    }


    public function createPdfMahilaParichayaPatra($id)
    {
        $mahilaParichayapatra=MahilaParichayapatra::where('id','=',$id)->get()->first();
        $pdf = SnappyPdf::loadView('sewa.parichayapatra.mahila.parichayapatra_doc',compact('mahilaParichayapatra'));
        $pdf->setOption('enable-javascript', true);

        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
//        $pdf->setOption('viewport-size', '400x200');
//    $pdf->setOption('no-outline', true);
//        $pdf->setOption('page-size','A5');
        $pdf->setOption('margin-left','0mm');
        $pdf->setOption('margin-right','0mm');
        $pdf->setOption('margin-top','9mm');
        $pdf->setOption('margin-bottom','0mm');
        $pdf->setOption('orientation', 'landscape');
        $pdf->setOption('page-height','125');
        $pdf->setOption('page-width','90');

        return $pdf->stream();
    }

    public function createDefaultMahilaParichayaPatra($id)
    {
        $mahilaParichayapatra=MahilaParichayapatra::where('id','=',$id)->get()->first();
        return view('sewa.parichayapatra.mahila.parichayapatra_doc',compact('mahilaParichayapatra'));
    }
}
