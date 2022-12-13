<?php

namespace App\Http\Controllers\Sifaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PassportSifarisController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:passport_sifaris-list|passport_sifaris-create|passport_sifaris-edit|passport_sifaris-delete', ['only' => ['index','store']]);
        $this->middleware('permission:passport_sifaris-create', ['only' => ['create','store']]);
        $this->middleware('permission:passport_sifaris-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:passport_sifaris-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sifaris.passport.index');
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
