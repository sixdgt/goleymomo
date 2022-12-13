<?php

namespace App\Http\Controllers\Sewa\Yojana;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(){
        return view('sewa.yojana.department.index');
    }

    public function create(){
        return view('sewa.yojana.department.create');
    }
}
