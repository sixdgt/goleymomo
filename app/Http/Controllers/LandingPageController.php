<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\LandingPage;
use Illuminate\Support\Facades\DB;

class LandingPageController extends Controller
{
    function index(){
        $data['landings'] = LandingPage::latest()->first();
        $data['products'] = Product::all();
        $data['users'] = User::all();
        $data['locations'] = DB::table('todays_location')->select('location_name')
        ->where('date_updated', date('Y-m-d'))->get();
        return view('welcome', $data);
    }
}
 