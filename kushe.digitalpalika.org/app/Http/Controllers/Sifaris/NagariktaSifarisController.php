<?php

namespace App\Http\Controllers\Sifaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NagariktaSifarisController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:nagarikta_sifaris-list|nagarikta_sifaris-create|nagarikta_sifaris-edit|nagarikta_sifaris-delete', ['only' => ['index','store']]);
        $this->middleware('permission:nagarikta_sifaris-create', ['only' => ['create','store']]);
        $this->middleware('permission:nagarikta_sifaris-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:nagarikta_sifaris-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sifaris.nagarikta.index');
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
