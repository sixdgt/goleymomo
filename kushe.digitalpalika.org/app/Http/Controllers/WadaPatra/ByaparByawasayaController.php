<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ByaparByawasayaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:byapar_byawasaya-list|byapar_byawasaya-create|byapar_byawasaya-edit|byapar_byawasaya-delete', ['only' => ['index','store']]);
        $this->middleware('permission:byapar_byawasaya-create', ['only' => ['create','store']]);
        $this->middleware('permission:byapar_byawasaya-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:byapar_byawasaya-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.byapar_byawasaya.index');
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
