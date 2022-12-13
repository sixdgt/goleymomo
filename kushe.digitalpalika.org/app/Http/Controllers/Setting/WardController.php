<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\DpParichaya;
use App\Models\DpWard;
use DataTables;
use Illuminate\Support\Facades\Auth;

class WardController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:ward_setting-list|ward_setting-create|ward_setting-edit|ward_setting-delete', ['only' => ['index','store']]);
        $this->middleware('permission:ward_setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:ward_setting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ward_setting-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if (session('success_message')){
            Alert::success('Success!', session('sucess_message'));
        }
        if($request->ajax()){
            $data = DpWard::all();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <button class="btn btn-sm btn-primary edit-ward" data-id="'.$row['id'].'"  data-bs-toggle="modal" data-bs-target="#wardModal" id="" data-target="#wardModal"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger delete-ward" data-id="'.$row['id'].'" ><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
      
        return view('settings.ward.index');
    }

    function create(Request $request){
        return view('settings.ward.create');
    }

    function store(Request $request){
        $validation = $request->validate(
            [
                'dp_ward_name' => 'required',
                'dp_ward_description' => 'required',
                'dp_ward_address' => 'required',
                'dp_ward_contact' => 'required',

            ],
            [
                'dp_ward_name.required'=>'fsdaf',
                'dp_ward_description.required'=>'fsdafa',
                'dp_ward_address.required'=>'fdsafsa',
                'dp_ward_contact.required'=>'fsadfa'
            ]
        );

        $data = [
            'dp_ward_name' => $request->dp_ward_name,
            'dp_ward_description' => $request->dp_ward_description,
            'dp_ward_address' => $request->dp_ward_address,
            'dp_ward_contact' => $request->dp_ward_contact,
            'dp_ward_bg_image' => "fsadf",
            'dp_gn_id' => Auth::user()->id,
        ];

        $res = DpWard::create($data);

//        if($request->ajax())
//        {

            if($res){
                return response()->json([

                    'message' => "वार्ड सफलतापूर्वक थप गरियो"

                ]);
            }
//        }


//        $res = DpWard::create($data);
//        if($res){
//            return redirect()->route('ward.index')->withSuccessMessage("Successfully added");
//        }

    }

    function edit($id){
        $ward=DpWard::where('id','=',$id)->get()->first();

        return view('settings.ward.edit',compact('ward'));
    }

    public function update(Request $request, $id)
    {
        $validation = $request->validate(
            [
                'dp_ward_name' => 'required',
                'dp_ward_description' => 'required',
                'dp_ward_address' => 'required',
                'dp_ward_contact' => 'required',

            ]
        );

        $data = [
            'dp_ward_name' => $request->dp_ward_name,
            'dp_ward_description' => $request->dp_ward_description,
            'dp_ward_address' => $request->dp_ward_address,
            'dp_ward_contact' => $request->dp_ward_contact,


        ];

        $res=DpWard::where('id','=',$id)->update($data);
        if($res){
            return response()->json([

                'message' => "डाटा अपडेट गरिएको छ"

            ]);
        }

    }

    function destroy(Request $request,$id){
        if($request->ajax())
        {
            if(DpWard::where('id','=',$id)->delete())
            {
                return response()->json([

                    'message' => "डाटा सिस्टमबाट मेटाइएको छ"

                ]);
            }

        }
    }
}
