<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class WadaPatraController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:wadapatra-list|wadapatra-create|wadapatra-edit|wadapatra-delete', ['only' => ['index','store']]);
        $this->middleware('permission:wadapatra-create', ['only' => ['create','store']]);
        $this->middleware('permission:wadapatra-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:wadapatra-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('wadapatra.index');
    }

    function create(Request $request){
    }

    function edit($id){
    }

    function update(Request $request)
    {
    }

    function delete($id){
    }
}
