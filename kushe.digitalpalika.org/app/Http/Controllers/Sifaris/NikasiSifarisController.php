<?php

namespace App\Http\Controllers\Sifaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NikasiSifarisController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:nikasi_sifaris-list|nikasi_sifaris-create|nikasi_sifaris-edit|nikasi_sifaris-delete', ['only' => ['index','store']]);
        $this->middleware('permission:nikasi_sifaris-create', ['only' => ['create','store']]);
        $this->middleware('permission:nikasi_sifaris-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:nikasi_sifaris-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sifaris.nikasi.index');
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
