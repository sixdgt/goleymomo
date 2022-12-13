<?php

namespace App\Http\Controllers\Sewa\Yojana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectiveSubAreaTypeController extends Controller
{
    public function index(){
        return view('sewa.yojana.subjective_subarea_type.index');
    }

    public function create(){
        return view('sewa.yojana.subjective_subarea_type.create');
    }
}
