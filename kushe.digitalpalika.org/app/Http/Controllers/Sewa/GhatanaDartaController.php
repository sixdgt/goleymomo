<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GhatanaDartaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:ghatana_darta-list|ghatana_darta-create|ghatana_darta-edit|ghatana_darta-delete', ['only' => ['index','store']]);
        $this->middleware('permission:ghatana_darta-create', ['only' => ['create','store']]);
        $this->middleware('permission:ghatana_darta-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:ghatana_darta-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.ghatana_darta.index');
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
