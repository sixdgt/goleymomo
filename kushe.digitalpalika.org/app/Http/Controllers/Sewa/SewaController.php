<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:sewa-list|sewa-create|sewa-edit|sewa-delete', ['only' => ['index','store']]);
        $this->middleware('permission:sewa-create', ['only' => ['create','store']]);
        $this->middleware('permission:sewa-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:sewa-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.index');
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
