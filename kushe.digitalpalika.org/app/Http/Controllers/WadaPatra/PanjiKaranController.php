<?php

namespace App\Http\Controllers\WadaPatra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanjiKaranController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:panjikaran-list|panjikaran-create|panjikaran-edit|panjikaran-delete', ['only' => ['index','store']]);
        $this->middleware('permission:panjikaran-create', ['only' => ['create','store']]);
        $this->middleware('permission:panjikaran-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:panjikaran-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('wadapatra.panji_karan.index');
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
