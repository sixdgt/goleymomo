<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;

class YojanaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:yojana-list|yojana-create|yojana-edit|yojana-delete', ['only' => ['index','store']]);
        $this->middleware('permission:yojana-create', ['only' => ['create','store']]);
        $this->middleware('permission:yojana-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:yojana-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        if($request->ajax()){
            $data[] = [
                'id' => '1',
                'plan_title' => 'plan_title',
                'plan_budget' => 'plan_budget',
                'plan_process' => 'plan_process', 
                'plan_level' => 'plan_level',
                'plan_subjective_area' => 'plan_subjective_area',
                'plan_targeted_public' => 'plan_targeted_public',
                
            ];

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="yojana/show"> <button class="btn btn-sm btn-primary" >View</button></a>
                    <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editYojana" data-target="#myModal">Edit</button>
                    <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteYojana">Delete</button>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('sewa.yojana.index');
    }

    public function settings(Request $request){
        return view('sewa.yojana.settings');
    }

    function create(Request $request){
        return view('sewa.yojana.create');
    }

    function edit($id){
    }

    function show(){
        
        return view('sewa.yojana.show');
    }

    function update(Request $request)
    {
    }

    function delete($id){
    }
}
