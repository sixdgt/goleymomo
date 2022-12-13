<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuchanaPrabidhiController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:suchana_prabidhi-list|suchana_prabidhi-create|suchana_prabidhi-edit|suchana_prabidhi-delete', ['only' => ['index','store']]);
        $this->middleware('permission:suchana_prabidhi-create', ['only' => ['create','store']]);
        $this->middleware('permission:suchana_prabidhi-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:suchana_prabidhi-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sewa.suchana_prabidhi.index');
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
