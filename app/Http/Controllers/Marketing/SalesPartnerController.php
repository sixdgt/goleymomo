<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class SalesPartnerController extends Controller
{
    function index(){
        $data['partners'] = User::all();
        return view('dashboard.marketing.partner', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
