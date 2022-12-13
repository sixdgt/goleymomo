<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KrishiController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:krishi-list|krishi-create|krishi-edit|krishi-delete', ['only' => ['index','store']]);
        $this->middleware('permission:krishi-create', ['only' => ['create','store']]);
        $this->middleware('permission:krishi-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:krishi-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.krishi.index');
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
