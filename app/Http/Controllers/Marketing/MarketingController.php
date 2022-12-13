<?php

namespace App\Http\Controllers\Marketing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Marketing;
use Illuminate\Support\Facades\Auth;

class MarketingController extends Controller
{
    function create(Request $request){
        // validate Requests
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'email' => 'required|email|unique:marketings,email',
            'password' => 'required|min:4|max:30',
            'cpassword' => 'required|min:4|max:30|same:password',
        ],
        [
            'email.unique' => "Email already registered!!",
            'name.required' => "* Required",
            'contact.required' => "* Required",
            'email.required' => "* Required",
            'password.required' => "* Required",
            'cpassword.required' => "* Required",
            'cpassword.same' => "Password didn't match",

        ]);

        $marketing = new Marketing;
        $marketing->name = $request->name;
        $marketing->contact = $request->contact;
        $marketing->email = $request->email;
        $marketing->password = \Hash::make($request->password);
        $save = $marketing->save();

        if($save){
            return redirect()->back()->with('success', 'Registered successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }

    }

    function check(Request $request){

        // validate request
        $request->validate([
            'email' => 'required|email|exists:marketings,email',
            'password' => 'required|min:4|max:30',
        ],[
            'email.exists' => "Email already registered!!",
            'email.required' => "* Required",
            'password.required' => "* Required",
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('marketing')->attempt($creds)){
            return redirect()->route('marketing.home');
        }else{
            return redirect()->route('marketing.login')->with('fail', 'Incorrect credentials');
        }
    }

    function logout(){
        Auth::guard('marketing')->logout();
        return redirect('/'); 
    }
}
