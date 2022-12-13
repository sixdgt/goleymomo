<?php

namespace App\Http\Controllers\Sewa\Yojana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProcessLevelController extends Controller
{
    public function index(){
        return view('sewa.yojana.process_level.index');
    }

    public function create(){
        return view('sewa.yojana.process_level.create');
    }
}
