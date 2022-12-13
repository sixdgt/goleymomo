<?php

namespace App\Http\Controllers\Sifaris;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TheganaPramanikaranSifarisController extends Controller
{
    /**
     * Constructor.
     * 
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:thegana_pramanikaran-list|thegana_pramanikaran-create|thegana_pramanikaran-edit|thegana_pramanikaran-delete', ['only' => ['index','store']]);
        $this->middleware('permission:thegana_pramanikaran-create', ['only' => ['create','store']]);
        $this->middleware('permission:thegana_pramanikaran-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:thegana_pramanikaran-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){

        return view('sifaris.thegana_pramanikaran.index');
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
