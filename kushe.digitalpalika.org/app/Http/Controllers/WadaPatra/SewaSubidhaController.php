<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SewaSubidhaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:sewasubidha-list|sewasubidha-create|sewasubidha-edit|sewasubidha-delete', ['only' => ['index','store']]);
        $this->middleware('permission:sewasubidha-create', ['only' => ['create','store']]);
        $this->middleware('permission:sewasubidha-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sewasubidha-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.sewa_subidha.index');
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
