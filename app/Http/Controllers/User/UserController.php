<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function create(Request $request){
        // validate Requests
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|max:30',
            'cpassword' => 'required|min:4|max:30|same:password',
        ],
        [
            'email.unique' => "Email already registered!!",
            'name.required' => "* Required",
            'email.required' => "* Required",
            'password.required' => "* Required",
            'cpassword.required' => "* Required",
            'cpassword.same' => "Password didn't match",

        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->user_type = 'sales';
        $user->password = \Hash::make($request->password);
        $user->profile_img = 'images/profile.png';
        $save = $user->save();

        if($save){
            return redirect()->back()->with('success', 'Registered successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }

    }

    function commission(){
        $data['users'] = DB::table('users as u')
        ->join('commissions as c' ,'u.id', '=', 'c.user_id', 'left')
        ->join('sales_grand as sg', 'u.id', '=', 'sg.user_id')
        ->select('c.commission_rate', 'u.id','u.name', 'u.user_type', 'u.id as marketing_id', 'sg.total_amt', 'sg.commission_payable', 'sg.due_amt', 'sg.id as sg_id')
        ->where('sg.is_paid', 'not_paid')
        ->where('u.id', Auth::id())
        ->first();

        $data['self_history'] = DB::table('sales_payment as sp')
        ->join('users as u', 'u.id', '=', 'sp.user_id')
        ->where('sp.user_id', Auth::id())
        ->select('u.id as user_id', 'u.name', 'u.email', 'sp.paid_amt', 'sp.paid_at', 'sp.payment_voucher')->get();
        
        $data['partner_history'] = DB::table('sales_partner_payment as spp')
        ->join('users as u', 'u.id', '=', 'spp.user_id')
        ->where('spp.parent_id', Auth::id())
        ->select('u.id as user_id', 'u.name', 'u.email', 'spp.paid_amt', 'spp.paid_at', 'spp.payment_voucher')->get();

        return view('dashboard.user.commission', $data);
    }

    function setting(){
        return view('dashboard.user.setting');
    }

    function home(){
        $location['locations'] = DB::table('todays_location')
        ->select('location_name')
        ->where('date_updated', date('Y-m-d'))->get();
        
        return view('dashboard.user.home', $location);
    }

    function check(Request $request){

        // validate request
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:4|max:30',
        ],[
            'email.exists' => "Email already registered!!",
            'email.required' => "* Required",
            'password.required' => "* Required",
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('web')->attempt($creds)){
            
            return redirect()->route('user.home');
        }else{
            return redirect()->route('user.login')->with('fail', 'Incorrect credentials');
        }
    }

    function partner(){
        $data['partners'] = User::all()->where('user_id', Auth::user()->id);
        return view('dashboard.user.partner', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }
    
    function todays_location(Request $request){
        $data = [
            'user_id' => Auth::id(), 
            'location_name'=> $request->location_name,
            'date_updated' => date('Y-m-d')
        ];
        DB::table('todays_location')->insert($data);
        return redirect()->route('user.home')->with('success', "Successfully updated");
    }

    function partner_add(Request $request){
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'user_type' => 'sales',
            'is_verified' => 'no',
            'user_id' => Auth::user()->id,
            'created_at' => date('Y-m-d h:m:s'),
            'password' => Hash::make($request['password']),
        ];
        $res = DB::table('users')->insert($data);
        if($res){
            return redirect()->back()->with('success', 'Registered successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    function update_password(Request $request){
        $request->validate([
            'password' => 'required|min:4|max:30',
            'new_password' => 'required|min:4|max:30',
            'confirm_password' => 'required|same:new_password|min:4|max:30',
        ],[
            'password.required' => "* Required",
            'new_password.required' => "* Required",
            'confirm_password.required' => "* Required",
            'confirm_password.same' => "* Password didn't match",
        ]);

        $user = User::where('id', Auth::id())->first();
        $user->password = Hash::make($request['new_password']);
        $res = $user->save();
        if($res){
            return redirect()->back()->with('success', 'Updated successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    function logout(){
        Auth::guard('web')->logout();
        return redirect('/'); 
    }

    function profile(){
        $data['profile'] = User::where('id', Auth::id())->first();
        return view('dashboard.user.profile', $data);
    }

    function profile_update(Request $request){
        $this->validate($request, [
            'profile_img' => 'required|mimes:JPEG,JPG,PNG,jpeg,jpg,png|max:2048',
            'facebook_url' => 'required|string',
            'instagram_url' => 'required|string',
            'message' => 'required|string',
        ]);

        if($request->file('profile_img')) {
            $file_name = time().'_'.$request->file('profile_img')->getClientOriginalName();
            $file_path = $request->file('profile_img')->storeAs('uploads/profile_img', $file_name, 'public');
        
            $user = User::where('id', Auth::id())->first();
            $user->facebook_url = $request->facebook_url;
            $user->instagram_url = $request->instagram_url;
            $user->message = $request->message;
            $user->profile_img = '/storage/' . $file_path;
            if(isset($request->user_type)){
                $user->user_type = $request->user_type;
            }
            $res = $user->save();
            if($res){
                return redirect()->back()->with('success', 'Updated successfully');
            }else{
                return redirect()->back()->with('fail', 'Something went wrong');
            }
        }
    }
}
