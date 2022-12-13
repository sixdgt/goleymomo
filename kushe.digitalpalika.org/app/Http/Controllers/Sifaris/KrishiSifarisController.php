<?php

namespace App\Http\Controllers\Sifaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KrishiSifarisController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:krishi_sifaris-list|krishi_sifaris-create|krishi_sifaris-edit|krishi_sifaris-delete', ['only' => ['index','store']]);
        $this->middleware('permission:krishi_sifaris-create', ['only' => ['create','store']]);
        $this->middleware('permission:krishi_sifaris-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:krishi_sifaris-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sifaris.krishi.index');
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
