<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwasthyaController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:swasthya-list|swasthya-create|swasthya-edit|swasthya-delete', ['only' => ['index','store']]);
        $this->middleware('permission:swasthya-create', ['only' => ['create','store']]);
        $this->middleware('permission:swasthya-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:swasthya-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.swasthya.index');
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
