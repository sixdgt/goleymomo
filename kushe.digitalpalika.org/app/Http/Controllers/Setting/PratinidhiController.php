<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\DpParichaya;
use App\Models\DpPratinidhi;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Validator;

use Illuminate\Validation\ValidationException;

use Yajra\DataTables\Facades\DataTables;

class PratinidhiController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    public $rules = [
        "dp_pratinidhi_first_name" => 'required|max:225',
        "dp_pratinidhi_middle_name" => 'max:225',
        "dp_pratinidhi_last_name" => 'required|max:225',
        "dp_pratinidhi_designation" => 'required|max:225',
        "dp_pratinidhi_gender" => 'required|in:महिला,पुरुष,तेश्रो लिङ्गी',
        "dp_pratinidhi_dob" => 'required',
        "dp_pratinidhi_contact" => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    ];

    public $messages = [
        'required' => 'यो क्षेत्र आवश्यक छ।',
        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
        'min' => 'यो फिल्डले न्यूनतम संख्या :min सम्म मात्र लिन्छ।',
        'in'=>':in हुनु पर्छ।',
        'regex'=>'अमान्य मिति ढाँचा'

    ];

    function __construct(){
        $this->middleware('permission:pratinidhi_setting-list|pratinidhi_setting-create|pratinidhi_setting-edit|pratinidhi_setting-delete', ['only' => ['index','store']]);
        $this->middleware('permission:pratinidhi_setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:pratinidhi_setting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:pratinidhi_setting-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if($request->ajax()){
            $data = DpPratinidhi::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return
                        '<div class="text-center">
                            <a href="'.route('pratinidhi.edit',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="pratinidhiEditBtn"><i class="fa fa-pencil"></i></a>

                            <a class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="pratinidhiDeleteBtn"><i class="fa fa-trash"></i></a>
                        </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('settings.pratinidhi.index');
    }

    function create(){

        return view('settings.pratinidhi.create');
    }

    function store(Request $request)
    {
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

        $dp_pratinidhi=new DpPratinidhi();
        $dp_pratinidhi->dp_pratinidhi_first_name=$request['dp_pratinidhi_first_name'];
        $dp_pratinidhi->dp_pratinidhi_middle_name=$request['dp_pratinidhi_middle_name'];
        $dp_pratinidhi->dp_pratinidhi_last_name=$request['dp_pratinidhi_last_name'];
        $dp_pratinidhi->dp_pratinidhi_designation=$request['dp_pratinidhi_designation'];
        $dp_pratinidhi->dp_pratinidhi_gender=$request['dp_pratinidhi_gender'];
        $dp_pratinidhi->dp_pratinidhi_dob=$request['dp_pratinidhi_dob'];
        $dp_pratinidhi->dp_pratinidhi_contact=$request['dp_pratinidhi_contact'];


            if($request->has('dp_pratinidhi_profile_pic_fname') && $request->has('dp_pratinidhi_parichayapatra_file_fname'))
            {
                $profile_file_path='files/pratinidhi/profile/'.$request->dp_pratinidhi_profile_pic_fname;
                File::move(storage_path('app/files/temp-files/'.$request->dp_pratinidhi_profile_pic_fname), public_path($profile_file_path));
                $dp_pratinidhi->dp_pratinidhi_profile_pic=$profile_file_path;


                $parichayapatra_file_path='files/pratinidhi/profile/'.$request->dp_pratinidhi_parichayapatra_file_fname;
                File::move(storage_path('app/files/temp-files/'.$request->dp_pratinidhi_parichayapatra_file_fname), public_path($parichayapatra_file_path));
                $dp_pratinidhi->dp_pratinidhi_parichayapatra_file=$parichayapatra_file_path;

            }
            else{

                return Redirect::back()->withInput()->withErrors('कृपया फाइल चयन गर्नुहोस्');

            }
        if($dp_pratinidhi->save())
        {
            return Redirect::route('pratinidhi.index');
        }


    }

    function edit($id){
        $dpPratinidhi=DpPratinidhi::where('id','=',$id)->get()->first();

        return view('settings.pratinidhi.edit',compact('dpPratinidhi'));
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

//        $dp_pratinidhi=new DpPratinidhi();
        $dp_pratinidhi=DpPratinidhi::where('id','=',$id)->get()->first();
        $dp_pratinidhi->dp_pratinidhi_first_name=$request['dp_pratinidhi_first_name'];
        $dp_pratinidhi->dp_pratinidhi_middle_name=$request['dp_pratinidhi_middle_name'];
        $dp_pratinidhi->dp_pratinidhi_last_name=$request['dp_pratinidhi_last_name'];
        $dp_pratinidhi->dp_pratinidhi_designation=$request['dp_pratinidhi_designation'];
        $dp_pratinidhi->dp_pratinidhi_gender=$request['dp_pratinidhi_gender'];
        $dp_pratinidhi->dp_pratinidhi_dob=$request['dp_pratinidhi_dob'];
        $dp_pratinidhi->dp_pratinidhi_contact=$request['dp_pratinidhi_contact'];
//        if($request->session()->has('dp_pratinidhi_profile_pic') && $request->session()->has('dp_pratinidhi_parichayapatra_pic'))
//        {
//
//            $file_name_dp_pratinidhi_profile_pic=$request->session()->get('dp_pratinidhi_profile_pic');
//            $file_name_dp_pratinidhi_parichayapatra_file=$request->session()->get('dp_pratinidhi_parichayapatra_file');
//            File::move(storage_path('app/files/temp-files/'.$file_name_dp_pratinidhi_profile_pic), public_path('files/pratinidhi/profile/'.$file_name_dp_pratinidhi_profile_pic));
//            File::move(storage_path('app/files/temp-files/'.$file_name_dp_pratinidhi_parichayapatra_file), public_path('files/pratinidhi/parichayapatra/'.$file_name_dp_pratinidhi_parichayapatra_file));
//            $dp_pratinidhi->dp_pratinidhi_profile_pic='files/pratinidhi/profile/'.$file_name_dp_pratinidhi_profile_pic;
//            $dp_pratinidhi->dp_pratinidhi_parichayapatra_file='files/pratinidhi/parichayapatra/'.$file_name_dp_pratinidhi_parichayapatra_file;
//
//        }
//        else{
//            return Redirect::back()->withErrors(['dp_pratinidhi_profile_pic'=> 'Please select the profile','dp_pratinidhi_parichayapatra_pic'=>'Please add parichayapatra']);
//        }
        if($dp_pratinidhi->save())
        {
            return Redirect::route('pratinidhi.index');
        }
    }

    function delete($id){
    }

    function destroy($id)
    {
        return (DpPratinidhi::find($id)->delete($id)) ?
            response()->json(
                [
                    'status' => 200,

                    'message' => 'डाटा सिस्टमबाट मेटाइएको छ'

                ]
            ) : response()->json(
                [
                    'status' => 400,

                    'message' => 'सर्भर ERROR!'
                ]
            );
    }
}
