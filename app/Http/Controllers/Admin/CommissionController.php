<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commission;

class CommissionController extends Controller
{
    function create(Request $request){
        $request->validate([
            'commission_rate' => 'required'
        ]);

    }
}
