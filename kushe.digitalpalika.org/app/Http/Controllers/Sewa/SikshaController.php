<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SikshaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:siksha-list|siksha-create|siksha-edit|siksha-delete', ['only' => ['index','store']]);
        $this->middleware('permission:siksha-create', ['only' => ['create','store']]);
        $this->middleware('permission:siksha-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:siksha-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.siksha.index');
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
