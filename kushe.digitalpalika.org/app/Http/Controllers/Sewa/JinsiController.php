<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JinsiController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:jinsi-list|jinsi-create|jinsi-edit|jinsi-delete', ['only' => ['index','store']]);
        $this->middleware('permission:jinsi-create', ['only' => ['create','store']]);
        $this->middleware('permission:jinsi-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:jinsi-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.jinsi.index');
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
