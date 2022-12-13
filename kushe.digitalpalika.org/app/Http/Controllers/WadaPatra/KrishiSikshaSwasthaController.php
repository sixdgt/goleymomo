<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KrishiSikshaSwasthaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:krishi_siksha_swastha-list|krishi_siksha_swastha-create|krishi_siksha_swastha-edit|krishi_siksha_swastha-delete', ['only' => ['index','store']]);
        $this->middleware('permission:krishi_siksha_swastha-create', ['only' => ['create','store']]);
        $this->middleware('permission:krishi_siksha_swastha-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:krishi_siksha_swastha-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.krishi_siksha_swastha.index');
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
