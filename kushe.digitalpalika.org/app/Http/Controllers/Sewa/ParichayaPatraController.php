<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParichayaPatraController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:parichaya_patra-list|parichaya_patra-create|parichaya_patra-edit|parichaya_patra-delete', ['only' => ['index','store']]);
        $this->middleware('permission:parichaya_patra-create', ['only' => ['create','store']]);
        $this->middleware('permission:parichaya_patra-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:parichaya_patra-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.parichayapatra.index');
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
