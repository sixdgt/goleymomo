<?php

namespace App\Http\Controllers\GaupalikaNagarpalika;

use App\Http\Controllers\Controller;
use App\Models\DpParichaya;
use Illuminate\Http\Request;

class GaupalikaNagarpalikaController extends Controller
{
    /**
     * Constructor.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct(){
        $this->middleware('permission:gaupalika_nagarpalika-list|gaupalika_nagarpalika-create|gaupalika_nagarpalika-edit|gaupalika_nagarpalika-delete', ['only' => ['index','store']]);
        $this->middleware('permission:gaupalika_nagarpalika-create', ['only' => ['create','store']]);
        $this->middleware('permission:gaupalika_nagarpalika-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:gaupalika_nagarpalika-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){
        return view('gaupalika_nagarpalika.index');
    }

    function create(Request $request){
    }

    function show()
    {
        $palika_parichaya=DpParichaya::all();
        $data=[
            'palika_parichaya'=>$palika_parichaya
        ];
        return view('gaupalika_nagarpalika.palika-parichaya',$data);
    }

    function edit($id){
    }

    function update(Request $request)
    {
    }

    function delete($id){
    }
}
