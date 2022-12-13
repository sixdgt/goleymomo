<?php

namespace App\Http\Controllers\Sewa\Yojana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index(){
        return view('sewa.yojana.sources.index');
    }

    public function create(){
        return view('sewa.yojana.sources.create');
    }
}
