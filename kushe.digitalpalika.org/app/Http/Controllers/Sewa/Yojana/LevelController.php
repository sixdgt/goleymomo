<?php

namespace App\Http\Controllers\Sewa\Yojana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){
        return view('sewa.yojana.level.index');
    }

    public function create(){
        return view('sewa.yojana.level.create');
    }
}
