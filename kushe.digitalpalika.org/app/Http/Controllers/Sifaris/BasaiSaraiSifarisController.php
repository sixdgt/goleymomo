<?php

namespace App\Http\Controllers\Sifaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BasaiSaraiSifarisController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:basai_sarai_sifaris-list|basai_sarai_sifaris-create|basai_sarai_sifaris-edit|basai_sarai_sifaris-delete', ['only' => ['index','store']]);
        $this->middleware('permission:basai_sarai_sifaris-create', ['only' => ['create','store']]);
        $this->middleware('permission:basai_sarai_sifaris-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:basai_sarai_sifaris-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sifaris.basai_sarai.index');
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
