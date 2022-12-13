<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Models\DpParichaya;
use Illuminate\Support\Facades\Auth;

class ParichayaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:parichaya_setting-list|parichaya_setting-create|parichaya_setting-edit|parichaya_setting-delete', ['only' => ['index','store']]);
        $this->middleware('permission:parichaya_setting-create', ['only' => ['create','store']]);
        $this->middleware('permission:parichaya_setting-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:parichaya_setting-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if (session('success_message')){
            Alert::success('Success!', session('sucess_message'));
        }
        return view('settings.parichaya.index');
    }

    function create(Request $request){
    }

    function store(Request $request){
        $validator = Validator::make($request->all(), [
            'dp_gn_name' => 'required',
            'dp_gn_history' => 'required',
            'dp_gn_long' => 'required',
            'dp_gn_lat' => 'required',
            'dp_gn_boundary' => 'required',
            'dp_gn_demographics' => 'required',
            'dp_gn_religion' => 'required',
            'dp_gn_culture' => 'required',
            'dp_gn_architecture' => 'required',
            'dp_gn_city_scape' => 'required',
            'dp_gn_tourism_area' => 'required',
            'dp_gn_population' => 'required',
            'dp_gn_education' => 'required',
            'dp_gn_healthcare' => 'required',
            'dp_gn_transport' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('parichaya.index')->withErrors($validator)->withInput();
        }else{
            $id = Auth::id();
            $data = [
            'dp_gn_name' => $request->dp_gn_name,
            'dp_gn_history' => $request->dp_gn_history,
            'dp_gn_long' => $request->dp_gn_long,
            'dp_gn_lat' => $request->dp_gn_lat,
            'dp_gn_boundary' => $request->dp_gn_boundary,
            'dp_gn_demographics' => $request->dp_gn_demographics,
            'dp_gn_religion' => $request->dp_gn_religion,
            'dp_gn_culture' => $request->dp_gn_culture,
            'dp_gn_architecture' => $request->dp_gn_architecture,
            'dp_gn_city_scape' => $request->dp_gn_city_scape,
            'dp_gn_tourism_area' => $request->dp_gn_tourism_area,
            'dp_gn_population' => $request->dp_gn_population,
            'dp_gn_education' => $request->dp_gn_education,
            'dp_gn_healthcare' => $request->dp_gn_healthcare,
            'dp_gn_transport' => $request->dp_gn_transport,
            'dp_user_id' => $id,
            ];

            $res = DpParichaya::create($data);
            if($res){
                return redirect()->route('parichaya.index')->withSuccessMessage("Successfully added");
            }
        }
    }

    function edit($id){

    }

    function update(Request $request){
    }

    function delete($id){
    }
}
