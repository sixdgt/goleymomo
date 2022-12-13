<?php

namespace App\Http\Controllers\Sewa\GhatanaDarta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JanmaDartaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:janma_darta-list|janma_darta-create|janma_darta-edit|janma_darta-delete', ['only' => ['index','store']]);
        $this->middleware('permission:janma_darta-create', ['only' => ['create','store']]);
        $this->middleware('permission:janma_darta-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:janma_darta-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.ghatana_darta.janma.index');
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
