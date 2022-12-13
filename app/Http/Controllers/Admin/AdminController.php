<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Admin;
use App\Models\LandingPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    function userList(){
        $data['partners'] = User::all();
        return view('dashboard.admin.user', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    function check(Request $request){

        // validate request
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:5|max:30'
        ],
        [
            'email.exists' => "This email doesn't exists"
        ]);

        $creds = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect()->route('admin.home');
        }else{
            return redirect()->route('admin.login')->with('fail', 'Incorrect credentials');
        }
    }

    function commission(){
        $data['users'] = DB::table('users as u')
                        ->join('commissions as c','u.id', '=', 'c.user_id', 'left')
                        ->select('u.id','u.name', 'u.email', 'u.user_type', 'c.commission_rate')
                        ->get();
        return view('dashboard.admin.commission', $data);
    }

    function user_verify(Request $request){
        $res = DB::table('users')->where('id', $request->uid)->update(['is_verified' => 'yes']);
        if($res){
            return back()->with('success', 'Commission Added');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    function commission_pay(Request $request){

        $request->validate([
            'payment_voucher' => 'required|mimes:pdf,jpeg,jpg,png|max:2048',
        ]);

        if($request->file('payment_voucher')) {
            if($request->amount > $request->commission_payable){
                return back()->with('fail', 'Amount must be lesser than total amount');
            }else{

                $file_name = time().'_'.$request->file('payment_voucher')->getClientOriginalName();
                $file_path = $request->file('payment_voucher')->storeAs('uploads/payment_voucher', $file_name, 'public');
                
                $payment = DB::table('sales_payment')->insert([
                    'user_id' => $request->uid,
                    'paid_amt' => $request->amount,
                    'payment_voucher' => '/storage/' . $file_path,
                    'paid_at' => date('Y-m-d h:m:s')
                ]);

                if($request->amount == $request->commission_payable){
                    $data = [
                        'user_id' => $request->uid,
                        'commission_payable' => $request->commission_payable - $request->amount,
                        'due_amt' => $request->commission_payable - $request->amount,
                        'is_paid' => 'paid',
                        'is_paid_at' => date('Y-m-d h:m:s'),
                    ];
                }else{
                    $data = [
                        'user_id' => $request->uid,
                        'commission_payable' => $request->commission_payable - $request->amount,
                        'due_amt' => $request->commission_payable - $request->amount,
                    ];
                }

                $res = DB::table('sales_grand')->where('id', $request->sg_id)->update($data);
                if($res){
                    return back()->with('success', 'Updated');
                }else{
                    return back()->with('fail', 'Something went wrong');
                }
            }
            
        }
    }

    function commission_partner_pay(Request $request){

        $request->validate([
            'payment_voucher' => 'required|mimes:pdf,jpeg,jpg,png|max:2048',
        ]);

        if($request->file('payment_voucher')) {
            if($request->amount > $request->commission_payable){
                return back()->with('fail', 'Amount must be lesser than total amount');
            }else{

                $file_name = time().'_'.$request->file('payment_voucher')->getClientOriginalName();
                $file_path = $request->file('payment_voucher')->storeAs('uploads/payment_voucher', $file_name, 'public');
                
                $payment = DB::table('sales_partner_payment')->insert([
                    'user_id' => $request->uid,
                    'parent_id' => $request->parent_id,
                    'paid_amt' => $request->amount,
                    'payment_voucher' => '/storage/' . $file_path,
                    'paid_at' => date('Y-m-d h:m:s')
                ]);

                if($request->amount == $request->commission_payable){
                    $data = [
                        'user_id' => $request->uid,
                        'commission_payable' => $request->commission_payable - $request->amount,
                        'due_amt' => $request->commission_payable - $request->amount,
                        'is_paid' => 'paid',
                        'is_paid_at' => date('Y-m-d h:m:s'),
                    ];
                }else{
                    $data = [
                        'user_id' => $request->uid,
                        'commission_payable' => $request->commission_payable - $request->amount,
                        'due_amt' => $request->commission_payable - $request->amount,
                    ];
                }

                $res = DB::table('sales_partner_grand')->where('id', $request->sg_id)->update($data);
                if($res){
                    return back()->with('success', 'Updated');
                }else{
                    return back()->with('fail', 'Something went wrong');
                }
            }
            
        }
    }

    function commission_detail(){
        $data['users'] = DB::table('users as u')
                        ->join('sales_grand as sg', 'u.id', '=', 'sg.user_id')
                        ->select('u.id','u.name', 'u.user_type', 'u.id as marketing_id', 'sg.total_amt', 'sg.commission_payable', 'sg.due_amt', 'sg.id as sg_id')
                        ->where('sg.is_paid', 'not_paid')
                        ->get();
        return view('dashboard.admin.commission_details', $data);
    }
    function commission_view($id){
        $data['users'] = DB::table('users as u')
                        ->join('commissions as c' ,'u.id', '=', 'c.user_id', 'left')
                        ->select('u.id','name', 'u.user_type','c.commission_rate')
                        ->where('u.id', $id)->first();
        
        if($data['users']->user_type == 'marketings'){
            $data1['user_partners'] = User::where('user_id', $id)->get();

            if(count($data1['user_partners']) != 0){
                foreach($data1['user_partners'] as $user){
                    $res[] = [
                        'id' => $user->id,
                        'name' => $user->name,
                        'commission_rate' => $this->get_commission_rate($user->id)
                    ];   
                }
                $data['commissions'] = $res;
            }
        }
        
        return view('dashboard.admin.commission_view', $data);
    }

    function commission_detail_view($id){
        $data['users'] = DB::table('users as u')
                        ->join('commissions as c' ,'u.id', '=', 'c.user_id', 'left')
                        ->select('u.id','name', 'u.user_type','c.commission_rate')
                        ->where('u.id', $id)->first();
        
        if($data['users']->user_type == 'marketings'){
            $data1['user_partners'] = User::where('user_id', $id)->get();
        }

        $data['self_history'] = DB::table('sales_payment as sp')
        ->join('users as u', 'u.id', '=', 'sp.user_id')
        ->where('sp.user_id', $id)
        ->select('u.id as user_id', 'u.name', 'u.email', 'sp.paid_amt', 'sp.paid_at', 'sp.payment_voucher')->get();
        
        $data['partner_history'] = DB::table('sales_partner_payment as spp')
        ->join('users as u', 'u.id', '=', 'spp.user_id')
        ->where('spp.parent_id', $id)
        ->select('u.id as user_id', 'u.name', 'u.email', 'spp.paid_amt', 'spp.paid_at', 'spp.payment_voucher')->get();

        if(isset($data1)){
            foreach($data1['user_partners'] as $user){
                $res[] = [
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'commission_rate' => $this->get_commission_rate($user->id),
                    'total_amt' => $this->get_partner_total_amt($user->id),
                    'commission_payable' => $this->get_sales_partner_grand($user->id),
                    'sg_id' => $this->get_sales_partner_grand_id($user->id),
                ];   
            }
            $data['commissions'] = $res;
        }
        return view('dashboard.admin.commission_details_view', $data);
    }

    function get_partner_total_amt($id){
        $cm = DB::table('sales_partner_grand')->where('user_id', $id)->select('total_amt')->where('is_paid', 'not_paid')->first();

        if(isset($cm->total_amt)){
            return $cm->total_amt;
        }else{
            return 0;
        }
    }

    function get_sales_partner_grand($id){
        $cm = DB::table('sales_partner_grand')
        ->where('user_id', $id)
        ->where('is_paid', 'not_paid')
        ->select( 'id as sg_id', 'commission_payable')
        ->first();

        if(isset($cm->commission_payable)){
            return $cm->commission_payable;
        }else{
            return null;
        }
    }

    function get_sales_partner_grand_id($id){
        $cm = DB::table('sales_partner_grand')
        ->where('user_id', $id)
        ->where('is_paid', 'not_paid')
        ->select( 'id as sg_id', 'commission_payable')
        ->first();

        if(isset($cm->sg_id)){
            return $cm->sg_id;
        }else{
            return null;
        }
    }

    function get_commission_rate($id){
        $cm = DB::table('users_commission')->where('user_id', $id)->select('commission_rate')->orderBy('updated_at', 'desc')->first();
        if(isset($cm->commission_rate)){
            return $cm->commission_rate;
        }else{
            return 0;
        }
    }

    function commission_add(Request $request){
        $request->validate([
            'commission_rate' => 'required'
        ]);

        $data = [
            'user_id' => $request->uid,
            'commission_rate' => $request->commission_rate
        ];
        $res = DB::table('commissions')->insert($data);
        if($res){
            return back()->with('success', 'Commission Added');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    function commission_udpate(Request $request){
        $request->validate([
            'commission_rate' => 'required'
        ]);

        $data = [
            'user_id' => $request->uid,
            'commission_rate' => $request->commission_rate
        ];
        $res = DB::table('commissions')->where('user_id', $request->uid)->update($data);
        if($res){
            return back()->with('success', 'Commission Updates');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    function user_commission_add(Request $request){
        if(isset($request->uids)){
            for($i = 0; $i < count($request->uids); $i++){
                $datas[] = [
                    'user_id' => $request->uids[$i], 
                    'commission_rate' => $request->rates[$i],
                    'is_added_by' => $request->uid
                ];
            }
   
            $res = DB::table('users_commission')->insert($datas);
            if($res){
                return back()->with('success', 'Commission Added');
            }else{
                return back()->with('fail', 'Something went wrong');
            }
        }
    }

    function landing(){
        $data['landings'] = LandingPage::latest()->first();
        return view('dashboard.admin.landing', $data);
    }

    function landing_add(Request $request){
        if($request->file('background_image') || $request->file('director_image')) {
            $file_name = time().'_'.$request->file('background_image')->getClientOriginalName();
            $file_path = $request->file('background_image')->storeAs('uploads/background_image', $file_name, 'public');

            $director_file_name = time().'_'.$request->file('director_image')->getClientOriginalName();
            $director_file_path = $request->file('director_image')->storeAs('uploads/director_image', $director_file_name, 'public');
        }
        if(isset($director_file_path) && isset($file_path)){

            $data = [
                'vision' => $request->vision,
                'mission' => $request->mission,
                'director_message' => $request->director_message,
                'director_image' => '/storage/' . $director_file_path,
                'facebook_link' => $request->facebook_link,
                'instagram_link' => $request->instagram_link,
                'youtube_link' => $request->youtube_link,
                'background_image' => '/storage/' . $file_path,
            ];
        }else{
            
            $data = [
                'vision' => $request->vision,
                'mission' => $request->mission,
                'director_message' => $request->director_message,
                'director_image' => '',
                'facebook_link' => $request->facebook_link,
                'instagram_link' => $request->instagram_link,
                'youtube_link' => $request->youtube_link,
                'background_image' => '',
            ];
        }

        $landing_check = LandingPage::latest()->first();
        if(!is_null($landing_check)){
            $landing = LandingPage::find($landing_check->id);
            $landing->vision = $data['vision'];
            $landing->mission = $data['mission'];
            $landing->director_message = $data['director_message'];
            $landing->director_image = $data['director_image'];
            $landing->facebook_link = $data['facebook_link'];
            $landing->instagram_link = $data['instagram_link'];
            $landing->youtube_link = $data['youtube_link'];
            $landing->background_image = $data['background_image'];
            $res = $landing->save();
        }else{
            $landing = new LandingPage;
            $landing->vision = $data['vision'];
            $landing->mission = $data['mission'];
            $landing->facebook_link = $data['facebook_link'];
            $landing->director_message = $data['director_message'];
            $landing->director_image = $data['director_image'];
            $landing->instagram_link = $data['instagram_link'];
            $landing->youtube_link = $data['youtube_link'];
            $landing->background_image = $data['background_image'];
            $res = $landing->save();
        }
        if($res){
            return redirect()->route('admin.landing.index')->with('success', 'Landing Page details Added');
        }else{
            return redirect()->route('admin.landing.index')->with('fail', 'Something went wrong');
        }
    }

    function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); 
    }

    function orderList(){
        $data['orders'] = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.user_id', 'inner')
        ->select('orders.*','users.name','users.email')
        ->get();
        return view('dashboard.admin.order', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    function order_item($id){
        $data['order_items'] = DB::table('orders as o')
                        ->join('users as u' ,'u.id', '=', 'o.user_id', 'inner')
                        ->join('orders_products as op' ,'o.id', '=', 'op.order_id', 'inner')
                        ->join('products as p' ,'p.id', '=', 'op.product_id', 'inner')
                        ->select('u.name','u.email', 'o.order_code','o.created_at', 'o.order_status', 'o.file_uri', 'p.*', 'op.*')
                        ->where('o.id', $id)->get();
      
        return view('dashboard.admin.order_view', $data);
    }

    function order_status_update(Request $request){
        $data = [
            'order_status' => $request->order_status,
        ];
        $res = DB::table('orders')->where('order_code', $request->oid)->update($data);
        if($res){
            return back()->with('success', 'Commission Updates');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    function change(Request $request){

        // $validator = \Validator::make($request->all(), [
        //     'password' => 'required|min:6|max:15',
        //     'cpassword' => 'required|min:6|max:15|same:password',
        // ]);

        $user = User::find($request->uid);
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Updated successfully');
    }

    function partner_add(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|string|unique:users,email|max:191',
            'password' => 'required|string|min:5|max:191',
        ]);

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'user_type' => 'sales',
            'is_verified' => 'no',
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
}
