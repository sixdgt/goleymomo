<?php

namespace App\Http\Controllers\Sewa\GhatanaDarta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MrityuDartaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:mrityu_darta-list|mrityu_darta-create|mrityu_darta-edit|mrityu_darta-delete', ['only' => ['index','store']]);
        $this->middleware('permission:mrityu_darta-create', ['only' => ['create','store']]);
        $this->middleware('permission:mrityu_darta-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:mrityu_darta-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.ghatana_darta.mrityu.index');
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
