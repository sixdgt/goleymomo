<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GharJaggaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:gharjagga-list|gharjagga-create|gharjagga-edit|gharjagga-delete', ['only' => ['index','store']]);
        $this->middleware('permission:gharjagga-create', ['only' => ['create','store']]);
        $this->middleware('permission:gharjagga-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:gharjagga-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.ghar_jagga.index');
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
