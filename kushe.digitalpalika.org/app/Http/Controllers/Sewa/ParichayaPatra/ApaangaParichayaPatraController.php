<?php

namespace App\Http\Controllers\Sewa\ParichayaPatra;

use App\Http\Controllers\Controller;

use App\Rules\PhoneNumberValidation;

use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use App\Models\Sewa\ParichayaPatra\ApaangaParichayapatra;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use DataTables;
use function Sodium\compare;

class ApaangaParichayaPatraController extends Controller
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
        'integer'=> 'यो फिल्ड अंक हुनुपर्छ',
        'in'=>'चयन गरिएको लिङ्ग अमान्य छ।'
    ];

    public $rules = [
        'first_name' => 'required|string|max:191',
        'middle_name'=> 'string|max:191',
        'last_name' => 'required|string|max:191',
        'first_name_english' => 'required|string|max:191',
        'middle_name_english'=> 'string|max:191',
        'last_name_english' => 'required|string|max:191',

        'address_pradesh' => 'required|string|max:191',
        'address_jilla' => 'required|string|max:191',
        'address_palika' => 'required|string|max:191',
        'address_ward_no' => 'required|integer|max:100',
        'address_tol' => 'required|string|max:191',


        'father_first_name' => 'required|string|max:191',
        'father_middle_name'=> 'string|max:191',
        'father_last_name' => 'required|string|max:191',
        'father_first_name_english' => 'required|string|max:191',
        'father_middle_name_english'=> 'string|max:191',
        'father_last_name_english' => 'required|string|max:191',

        'mother_first_name' => 'required|string|max:191',
        'mother_middle_name'=>'string|max:191',
        'mother_last_name' => 'required|string|max:191',
        'mother_first_name_english' => 'required|string|max:191',
        'mother_middle_name_english'=>'string|max:191',
        'mother_last_name_english' => 'required|string|max:191',


        'grand_father_first_name' => 'required|string|max:191',
        'grand_father_middle_name' =>'string|max:191',
        'grand_father_last_name' => 'required|string|max:191',
        'grand_father_first_name_english' => 'required|string|max:191',
        'grand_father_middle_name_english' =>'string|max:191',
        'grand_father_last_name_english' => 'required|string|max:191',

        'dob' => 'required|string|max:191',
        'identity_card_no' =>'required',
        'gender' => 'required',
        'contact'=>'required|phone',
        'blood_group'=>'required',
//        'marital_status' => 'required|max:191|in:"विवाहीत","अविवाहीत","विधवा"',
        'identity_card_no'=>'required|string|max:50',
        'disability_type_nature'=>'required',
        'disability_type_severity'=>'required',
        'gender'=> 'required|string'
//            'picture' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
//            'citizenship' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
    ];


    function __construct(){
        $this->middleware('permission:apaanga-list|apaanga-create|apaanga-edit|apaanga-delete', ['only' => ['index','store']]);
        $this->middleware('permission:apaanga-create', ['only' => ['create','store']]);
        $this->middleware('permission:apaanga-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:apaanga-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if($request->ajax()){
            $data = ApaangaParichayapatra::all();
//            $data = array(
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
                    <a href="'.url("sewa/parichaya-patra/apaanga/".$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.url("sewa/parichaya-patra/apaanga/".$row['id']."/edit").'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editYojana" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteApaangaParichayaPatra"><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('sewa.parichayapatra.apaanga.index');
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



        $apaanga = new ApaangaParichayapatra();
        if($request->session()->has('apaanga_profile_picture') && $request->session()->has('apaanga_citizenship'))
        {
            $file_name_apaanga_profile_picture=$request->session()->get('apaanga_profile_picture');
//            File::move(storage_path('app/files/temp-files/'.$file_name_apaanga_profile_picture), public_path('files/parichayapatra/apaanga/profile/'.$file_name_apaanga_profile_picture));
            Storage::move('files/temp-files/'.$file_name_apaanga_profile_picture,'public/files/parichayapatra/apaanga/profile/'.$file_name_apaanga_profile_picture);
            $apaanga->apaanga_profile_picture='storage/files/parichayapatra/apaanga/profile/'.$file_name_apaanga_profile_picture;
            $request->session()->forget('apaanga_profile_picture');


            $file_name_apaanga_citizenship=$request->session()->get('apaanga_citizenship');
//            File::move(storage_path('app/files/temp-files/'.$file_name_apaanga_citizenship), public_path('files/parichayapatra/apaanga/citizenship/'.$file_name_apaanga_citizenship));
//            $apaanga->apaanga_citizenship='files/parichayapatra/apaanga/citizenship/'.$file_name_apaanga_citizenship;

            Storage::move('files/temp-files/'.$file_name_apaanga_citizenship,'public/files/parichayapatra/apaanga/citizenship/'.$file_name_apaanga_citizenship);
            $apaanga->apaanga_profile_picture='storage/files/parichayapatra/apaanga/citizenship/'.$file_name_apaanga_citizenship;
            $request->session()->forget('apaanga_citizenship');
        }
        else{
            return Redirect::back()->withErrors(['apaanga_citizenship'=> 'कृपया फाइल चयन गर्नुहोस्'])->withInput();
        }

        $apaanga->first_name = $request->first_name;
        $apaanga->middle_name = $request->middle_name;
        $apaanga->last_name = $request->last_name;

        $apaanga->first_name_english = $request->first_name_english;
        $apaanga->middle_name_english = $request->middle_name_english;
        $apaanga->last_name_english = $request->last_name_english;

        $apaanga->address_pradesh  = $request->address_pradesh;
        $apaanga->address_jilla  = $request->address_jilla;
        $apaanga->address_palika  = $request->address_palika;
        $apaanga->address_ward_no  = $request->address_ward_no;
        $apaanga->address_tol  = $request->address_tol;



        $apaanga->father_first_name=$request->father_first_name;
        $apaanga->father_middle_name=$request->father_middle_name;
        $apaanga->father_last_name=$request->father_last_name;

        $apaanga->father_first_name_english=$request->father_first_name_english;
        $apaanga->father_middle_name_english=$request->father_middle_name_english;
        $apaanga->father_last_name_english=$request->father_last_name_english;



        $apaanga->mother_first_name=$request->mother_first_name;
        $apaanga->mother_middle_name=$request->mother_middle_name;
        $apaanga->mother_last_name=$request->mother_last_name;

        $apaanga->mother_first_name_english=$request->mother_first_name_english;
        $apaanga->mother_middle_name_english=$request->mother_middle_name_english;
        $apaanga->mother_last_name_english=$request->mother_last_name_english;


        $apaanga->grand_father_first_name=$request->grand_father_first_name;
        $apaanga->grand_father_middle_name=$request->grand_father_middle_name;
        $apaanga->grand_father_last_name=$request->grand_father_last_name;

        $apaanga->grand_father_first_name_english=$request->grand_father_first_name_english;
        $apaanga->grand_father_middle_name_english=$request->grand_father_middle_name_english;
        $apaanga->grand_father_last_name_english=$request->grand_father_last_name_english;




        $apaanga->dob = $request->dob;

        $apaanga->gender = $request->gender;
        $apaanga->marital_status = 'fdsafdsa';
        $apaanga->contact=$request->contact;
        $apaanga->identity_card_no=$request->identity_card_no;
        $apaanga->blood_group=$request->blood_group;
        $apaanga->disability_type_nature=$request->disability_type_nature;
        $apaanga->disability_type_severity=$request->disability_type_severity;



        $query =$apaanga->save();

        if(!$query){
//            return back()->with('fail' , 'Opss! something went wrong');
            echo "dfas";
        }else{

            return redirect()->route('apaanga.show',['apaanga'=>$apaanga->id])->with('success' , 'सफलतापूर्वक स्टोर गरियो');

        }
    }

    function destroy($id){
        return (ApaangaParichayapatra::find($id)->delete($id)) ?
            response()->json(
                [
                    'status' => 200,

                    'message' => 'डाटा मेटाइएको छ'

                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'Something went wrong'
                ]
            );
    }

    function create(Request $request){
        return view('sewa.parichayapatra.apaanga.create');
    }

    function edit($id){
        $apaanga=ApaangaParichayapatra::where('id','=',$id)->get()->first();
        return view('sewa.parichayapatra.apaanga.edit',compact('apaanga'));
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



        $apaanga = apaangaParichayapatra::where('id','=',$id)->get()->first();
        if($request->session()->has('apaanga_profile_picture') && $request->session()->has('apaanga_citizenship'))
        {
            //delete old file and add new file

            File::delete(public_path($apaanga->apaanga_profile_picture));
            $file_name_apaanga_profile_picture=$request->session()->get('apaanga_profile_picture');
            File::move(storage_path('app/files/temp-files/'.$file_name_apaanga_profile_picture), public_path('files/parichayapatra/apaanga/profile/'.$file_name_apaanga_profile_picture));
            $apaanga->apaanga_profile_picture='files/parichayapatra/apaanga/profile/'.$file_name_apaanga_profile_picture;
            $request->session()->forget('apaanga_profile_picture');

            File::delete(public_path($apaanga->apaanga_citizenship));
            $file_name_apaanga_citizenship=$request->session()->get('apaanga_citizenship');
            File::move(storage_path('app/files/temp-files/'.$file_name_apaanga_citizenship), public_path('files/parichayapatra/apaanga/citizenship/'.$file_name_apaanga_citizenship));
            $apaanga->apaanga_citizenship='files/parichayapatra/apaanga/citizenship/'.$file_name_apaanga_citizenship;
            $request->session()->forget('apaanga_citizenship');

        }



        $apaanga->first_name = $request->first_name;
        $apaanga->middle_name = $request->middle_name;
        $apaanga->last_name = $request->last_name;

        $apaanga->first_name_english = $request->first_name_english;
        $apaanga->middle_name_english = $request->middle_name_english;
        $apaanga->last_name_english = $request->last_name_english;

        $apaanga->address_pradesh  = $request->address_pradesh;
        $apaanga->address_jilla  = $request->address_jilla;
        $apaanga->address_palika  = $request->address_palika;
        $apaanga->address_ward_no  = $request->address_ward_no;
        $apaanga->address_tol  = $request->address_tol;


        $apaanga->father_first_name=$request->father_first_name;
        $apaanga->father_middle_name=$request->father_middle_name;
        $apaanga->father_last_name=$request->father_last_name;

        $apaanga->father_first_name_english=$request->father_first_name_english;
        $apaanga->father_middle_name_english=$request->father_middle_name_english;
        $apaanga->father_last_name_english=$request->father_last_name_english;



        $apaanga->mother_first_name=$request->mother_first_name;
        $apaanga->mother_middle_name=$request->mother_middle_name;
        $apaanga->mother_last_name=$request->mother_last_name;

        $apaanga->mother_first_name_english=$request->mother_first_name_english;
        $apaanga->mother_middle_name_english=$request->mother_middle_name_english;
        $apaanga->mother_last_name_english=$request->mother_last_name_english;


        $apaanga->grand_father_first_name=$request->grand_father_first_name;
        $apaanga->grand_father_middle_name=$request->grand_father_middle_name;
        $apaanga->grand_father_last_name=$request->grand_father_last_name;

        $apaanga->grand_father_first_name_english=$request->grand_father_first_name_english;
        $apaanga->grand_father_middle_name_english=$request->grand_father_middle_name_english;
        $apaanga->grand_father_last_name_english=$request->grand_father_last_name_english;



        $apaanga->dob = $request->dob;
        $apaanga->gender = $request->gender;
        $apaanga->marital_status = 'fdsafdsa';
        $apaanga->contact=$request->contact;
        $apaanga->identity_card_no=$request->identity_card_no;
        $apaanga->blood_group=$request->blood_group;
        $apaanga->disability_type_nature=$request->disability_type_nature;
        $apaanga->disability_type_severity=$request->disability_type_severity;

//        dd($apaanga);
        $query =$apaanga->save();
//
        if(!$query){
            return back()->with('fail' , 'Opss! something went wrong');

        }else{

            return redirect()->route('apaanga.show',['apaanga'=>$id])->with('success' , 'सफलतापूर्वक अपडेट गरियो');

        }
    }

    function show($id)
    {
        $apaangaParichayapatra=ApaangaParichayapatra::where('id','=',$id)->get()->first();



        return view('sewa.parichayapatra.apaanga.show',compact('apaangaParichayapatra'));
    }

    function delete($id){

    }

    function createPdfApaangaParichayaPatra($id)
    {
        $apaangaParichayapatra=ApaangaParichayapatra::where('id','=',$id)->get()->first();

        $pdf = SnappyPdf::loadView('sewa.parichayapatra.apaanga.front_page',compact('apaangaParichayapatra'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
//        $pdf->setOption('viewport-size', '400x200');
//    $pdf->setOption('no-outline', true);
//        $pdf->setOption('page-size','A6');
        $pdf->setOption('margin-left','0mm');
        $pdf->setOption('margin-right','0mm');
        $pdf->setOption('margin-top','0mm');
        $pdf->setOption('margin-bottom','0mm');
        $pdf->setOption('orientation', 'landscape');
        $pdf->setOption('page-height','100');
        $pdf->setOption('page-width','106.5');

        return $pdf->stream();
    }

    public function createDefaultApaangaParichayaPatra($id)
    {
        $apaangaParichayapatra=ApaangaParichayapatra::where('id','=',$id)->get()->first();

        return view('sewa.parichayapatra.apaanga.front_page',compact('apaangaParichayapatra'));

    }
}
