<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\DpWard;
use App\Models\Karmachari;
use App\Models\KarmachariType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Validator;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class KarmachariController extends Controller
{
    /**
     * Constructor.
     *
     * @return \Illuminate\Http\Response
     */

    public $rules = [
        "dp_wada_id"=>'required',
        "dp_karmachari_type_id"=>'required',
        "dp_karmachari_first_name" => 'required|max:225',
        "dp_karmachari_middle_name" => 'max:225',
        "dp_karmachari_last_name" => 'required|max:225',
        "dp_karmachari_designation" => 'required|max:225',
        "dp_karmachari_phone_number" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    ];

    public $messages = [
        'required' => 'यो क्षेत्र आवश्यक छ।',
        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
        'in'=>':in हुनु पर्छ।',
        'regex'=>'अमान्य मिति ढाँचा'

    ];


    function __construct(){
        $this->middleware('permission:karmachari_setting-list|karmachari_setting-create|karmachari_setting-edit|karmachari_setting-delete', ['only' => ['index','store']]);
        $this->middleware('permission:karmachari_setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:karmachari_setting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:karmachari_setting-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){


        if($request->ajax()){

            $data=[];


                $karmacharis= DB::table('karmacharis')
                ->join('karmachari_types','karmachari_types.id','=','karmacharis.dp_karmachari_type_id')
                ->join('dp_wards','dp_wards.id','=','karmacharis.dp_wada_id')
                ->select('karmacharis.id','dp_wards.dp_ward_name','karmachari_types.types',
                'karmacharis.dp_karmachari_first_name',
                'karmacharis.dp_karmachari_designation',
                'karmacharis.dp_karmachari_phone_number',
                'karmacharis.dp_karmachari_profile_pic'
                )
                ->get();
                if ($request->has('id'))
                {
                    $karmacharis =DB::table('karmacharis')

                        ->join('karmachari_types','karmachari_types.id','=','karmacharis.dp_karmachari_type_id')
                        ->join('dp_wards','dp_wards.id','=','karmacharis.dp_wada_id')
                        ->select('karmacharis.id','dp_wards.dp_ward_name','karmachari_types.types',
                            'karmacharis.dp_karmachari_first_name',
                            'karmacharis.dp_karmachari_designation',
                            'karmacharis.dp_karmachari_phone_number',
                            'karmacharis.dp_karmachari_profile_pic'
                        )
                        ->where('karmacharis.id','=',$request->id)
                        ->get();
                }
                foreach ($karmacharis as $key => $karmachari) {
                    $eachKarmachari = array('id'=>$karmachari->id,
                    'dp_karmachari_checkbox'=>'',
                    'dp_karmachari_number'=>$karmachari->id,
                    'dp_karmachari_wada'=>$karmachari->dp_ward_name,
                    'dp_karmachari_type'=>$karmachari->types,
                    'dp_karmachari_full_name'=>$karmachari->dp_karmachari_first_name,
                    'dp_karmachari_padh'=>$karmachari->dp_karmachari_designation,
                    'dp_karmachari_contact'=>$karmachari->dp_karmachari_phone_number,
                    'dp_karmachari_photo'=>$karmachari->dp_karmachari_profile_pic,
                    );
                    array_push($data, $eachKarmachari);
                }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return
                        '<div class="text-center">
                            <a href="'.route("karmachari.edit",$row['id']).'"id="editKarmachari" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editKarmachari" ><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger" onclick="deleteKarmachari(' . $row['id'] . ')" data-id="'.$row['id'].'" id="deleteKarmachari"><i class="fa fa-trash"></i></a>
                        </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('settings.karmachari.index');
    }

    public function store(Request $request)
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

        $karmachari=new Karmachari();
        $karmachari->dp_wada_id=$request->dp_wada_id;
        $karmachari->dp_karmachari_type_id=$request->dp_karmachari_type_id;
        $karmachari->dp_karmachari_first_name=$request->dp_karmachari_first_name;
        $karmachari->dp_karmachari_middle_name=$request->dp_karmachari_middle_name;
        $karmachari->dp_karmachari_last_name=$request->dp_karmachari_last_name;
        $karmachari->dp_karmachari_designation=$request->dp_karmachari_designation;
        $karmachari->dp_karmachari_phone_number=$request->dp_karmachari_phone_number;

        if($request->session()->has('dp_karmachari_profile_pic'))
        {
            $file_name_dp_karmachari_profile_pic=$request->session()->get('dp_karmachari_profile_pic');
            File::move(storage_path('app/files/temp-files/'.$file_name_dp_karmachari_profile_pic), public_path('files/karmachari/'.$file_name_dp_karmachari_profile_pic));
            $karmachari->dp_karmachari_profile_pic='files/karmachari/'.$file_name_dp_karmachari_profile_pic;
            $request->session()->forget('dp_karmachari_profile_pic');
        }
        else{

            return Redirect::back()->withErrors(['dp_karmachari_profile_pic'=> 'कृपया फाइल चयन गर्नुहोस्']);
        }
        $karmachari->save();
        session()->flash('success',['id'=>$karmachari->id,'message'=>'नयाँ कर्मचारीको डाटा थपिएको छ']);
        return redirect(route('karmachari.index'));

    }

    function create(Request $request){
        $karmachariTypes=KarmachariType::all();
        $wada=DpWard::all();
        $data=[
            'karmachariTypes'=>$karmachariTypes,
            'wards'=>$wada
        ];
        return view('settings.karmachari.create',$data);
    }
    function show($id){
    }
    function edit($id){
        $karmacharis= DB::table('karmacharis')
        ->join('karmachari_types','karmachari_types.id','=','karmacharis.dp_karmachari_type_id')
        ->join('dp_wards','dp_wards.id','=','karmacharis.dp_wada_id')
        ->select('*')
        ->where('karmacharis.id','=',$id)
        ->get();
        $karmachariTypes=KarmachariType::all();
        $wada=DpWard::all();
        $data=[
            'id'=>$id,
            'karmachariTypes'=>$karmachariTypes,
            'wards'=>$wada,
            'karmacharis'=>$karmacharis
        ];

        return view('settings.karmachari.edit',$data);
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

        $karmachari=Karmachari::find($id);
        $karmachari->dp_wada_id=$request->dp_wada_id;
        $karmachari->dp_karmachari_type_id=$request->dp_karmachari_type_id;
        $karmachari->dp_karmachari_first_name=$request->dp_karmachari_first_name;
        $karmachari->dp_karmachari_middle_name=$request->dp_karmachari_middle_name;
        $karmachari->dp_karmachari_last_name=$request->dp_karmachari_last_name;
        $karmachari->dp_karmachari_designation=$request->dp_karmachari_designation;
        $karmachari->dp_karmachari_phone_number=$request->dp_karmachari_phone_number;

        if($request->session()->has('dp_karmachari_profile_pic'))
        {
            $file_name_dp_karmachari_profile_pic=$request->session()->get('dp_karmachari_profile_pic');
            File::move(storage_path('app/files/temp-files/'.$file_name_dp_karmachari_profile_pic), public_path('files/karmachari/'.$file_name_dp_karmachari_profile_pic));
            $karmachari->dp_karmachari_profile_pic='files/karmachari/'.$file_name_dp_karmachari_profile_pic;
            $request->session()->forget('dp_karmachari_profile_pic');
        }
        $karmachari->save();


        session()->flash('success',['id'=>$karmachari->id,'message'=>'कर्मचारीको डाटा अपडेट गरिएको छ']);

        return redirect(route('karmachari.index'));

    }

    function destroy($id){
        return (Karmachari::find($id)->delete($id)) ?
        response()->json(
            [
                'status' => 200,

                'message' => 'डाटा सिस्टमबाट मेटाइएको छ'

            ]
        ) : response()->json(
            [
                'status' => 400,
                'message' => 'Something went wrong'
            ]
        );
    }
}
