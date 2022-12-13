<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KarKanunController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:karkanun-list|karkanun-create|karkanun-edit|karkanun-delete', ['only' => ['index','store']]);
        $this->middleware('permission:karkanun-create', ['only' => ['create','store']]);
        $this->middleware('permission:karkanun-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:karkanun-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.kar_kanun.index');
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
