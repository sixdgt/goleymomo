<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    function index(){
        $data['sales'] = Sales::where('user_id', Auth::id())->get();
        return view('dashboard.user.sale', $data)->with('i', (request()->input('page', 1) - 1) * 10);
    }

    function get_commission_rate($id){
        $cm = DB::table('commissions')->where('user_id', $id)->select('commission_rate')->orderBy('updated_at', 'desc')->first();
        if(isset($cm->commission_rate)){
            return $cm->commission_rate;
        }else{
            return 0;
        }
    }

    function get_partner_commission_rate($user_id, $parent_id){
        $cm = DB::table('users_commission')->where(['user_id'=> $user_id, 'is_added_by' => $parent_id])->select('commission_rate')->orderBy('updated_at', 'desc')->first();
        if(isset($cm->commission_rate)){
            return $cm->commission_rate;
        }else{
            return 0;
        }
    }

    function salesEntry(Request $request){

        $request->validate([
            'card_amount' => 'required|integer',
            'cash_amount' => 'required|integer',
            'sales_voucher' => 'required|mimes:pdf,jpeg,jpg,png|max:2048',
            'sales_desc' => 'required|max:200|min:5',
        ]);

        if($request->file('sales_voucher')) {

            $file_name = time().'_'.$request->file('sales_voucher')->getClientOriginalName();
            $file_path = $request->file('sales_voucher')->storeAs('uploads/sales_voucher', $file_name, 'public');
        
            $user_id = Auth::user()->id;

            $sale = new Sales;
            $sale->user_id = $user_id;
            $sale->card_amount = $request->card_amount;
            $sale->cash_amount = $request->cash_amount;
            $sale->sales_desc = $request->sales_desc;
            $sale->sales_voucher = '/storage/' . $file_path;
            $query = $sale->save();
            
            $get_parent = User::where('id', Auth::id())->select('user_id')->first();

            $sales_grand = DB::table('sales_grand')->select('total_amt', 'commission_payable', 'is_paid')->where(['user_id' => $user_id, 'is_paid' => 'not_paid' ])->first();

            $sales_partner_grand = DB::table('sales_partner_grand')->select('total_amt', 'commission_payable', 'is_paid')->where(['user_id' => $user_id, 'is_paid' => 'not_paid' ])->first();

            if(!empty($sales_grand) && ($sales_grand->is_paid == "not_paid")){
                $total_amt = $request->card_amount + $request->cash_amount + $sales_grand->total_amt;
                $commission_payable = (($this->get_commission_rate($user_id)/100) * ($request->card_amount + $request->cash_amount)) + $sales_grand->commission_payable;
                
                $data = [
                    'total_amt' => $total_amt,
                    'user_id' => $user_id,
                    'entry_date' => date('Y-m-d'),
                    'commission_payable' => $commission_payable,
                    'due_amt' => $commission_payable,
                ];
                DB::table('sales_grand')->where('user_id', $user_id)->where('is_paid', 'not_paid')->update($data);

                if(!is_null($get_parent->user_id) && (!empty($sales_partner_grand)) && ($sales_partner_grand->is_paid == "not_paid")){
                    $p_total_amt = $request->card_amount + $request->cash_amount + $sales_partner_grand->total_amt;
                    $p_commission_payable = (($this->get_partner_commission_rate($user_id, $get_parent->user_id)/100) * ($request->card_amount + $request->cash_amount)) + $sales_partner_grand->commission_payable;
                    $partner_data = [
                        'total_amt' => $p_total_amt,
                        'user_id' => $user_id,
                        'entry_date' => date('Y-m-d'),
                        'commission_payable' => $p_commission_payable,
                        'due_amt' => $p_commission_payable,
                    ];

                    DB::table('sales_partner_grand')->where('user_id', $user_id)->where('is_paid', 'not_paid')->update($partner_data);
                }else{
                    $partner_data = [
                        'total_amt' => $request->card_amount + $request->cash_amount,
                        'user_id' => $user_id,
                        'entry_date' => date('Y-m-d'),
                        'is_paid' => 'not_paid',
                        'commission_payable' => ($this->get_partner_commission_rate($user_id, $get_parent->user_id)/100) *  ($request->card_amount + $request->cash_amount),
                        'due_amt' => ($this->get_partner_commission_rate($user_id, $get_parent->user_id)/100) *  ($request->card_amount + $request->cash_amount),
                    ];

                    DB::table('sales_partner_grand')->where('user_id', $user_id)->insert($partner_data);
                }
            } else{
                $total_amt = $request->card_amount + $request->cash_amount;
                $data = [
                    'total_amt' => $total_amt,
                    'user_id' => $user_id,
                    'entry_date' => date('Y-m-d'),
                    'is_paid' => 'not_paid',
                    'commission_payable' => ($this->get_commission_rate($user_id) / 100) *  $total_amt,
                    'due_amt' => ($this->get_commission_rate($user_id) / 100) *  $total_amt,
                ];
                DB::table('sales_grand')->where('user_id', $user_id)->insert($data);

                if(!is_null($get_parent->user_id) && (!empty($sales_partner_grand)) && ($sales_partner_grand->is_paid == "not_paid")){

                    $p_total_amt = $request->card_amount + $request->cash_amount + $sales_partner_grand->total_amt;
                    $p_commission_payable = (($this->get_partner_commission_rate($user_id, $get_parent->user_id)/100) * ($request->card_amount + $request->cash_amount)) + $sales_partner_grand->commission_payable;
                    $p_data = [
                        'total_amt' => $p_total_amt,
                        'user_id' => $user_id,
                        'entry_date' => date('Y-m-d'),
                        'commission_payable' => $p_commission_payable,
                        'due_amt' => $p_commission_payable,
                    ];

                    DB::table('sales_partner_grand')->where('user_id', $user_id)->where('is_paid', 'not_paid')->update($p_data);
                }else{
                    $total_amt = $request->card_amount + $request->cash_amount;
                    $sg_data = [
                        'total_amt' => $total_amt,
                        'user_id' => $user_id,
                        'entry_date' => date('Y-m-d'),
                        'is_paid' => 'not_paid',
                        'commission_payable' => ($this->get_partner_commission_rate($user_id, $get_parent->user_id) / 100) *  $total_amt,
                        'due_amt' => ($this->get_partner_commission_rate($user_id, $get_parent->user_id) / 100) *  $total_amt,
                    ];
                    DB::table('sales_partner_grand')->where('user_id', $user_id)->insert($sg_data);
                }
            }
            
            if($query){
                return redirect()->back()->with('success', 'sale entry successfully');
            }else{
                return redirect()->back()->with('fail', 'Something went wrong');
            }
        }
    }
}
