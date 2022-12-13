<?php

namespace App\Http\Controllers\Sewa\Yojana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectiveSubAreaController extends Controller
{
    public function index(){
        return view('sewa.yojana.subjective_subarea.index');
    }

    public function create(){
        return view('sewa.yojana.subjective_subarea.create');
    }
}
