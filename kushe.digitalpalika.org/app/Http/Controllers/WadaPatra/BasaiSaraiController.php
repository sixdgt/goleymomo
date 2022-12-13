<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasaiSaraiController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:basai_sarai-list|basai_sarai-create|basai_sarai-edit|basai_sarai-delete', ['only' => ['index','store']]);
        $this->middleware('permission:basai_sarai-create', ['only' => ['create','store']]);
        $this->middleware('permission:basai_sarai-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:basai_sarai-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.basai_sarai.index');
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
