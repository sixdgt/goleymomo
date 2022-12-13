<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    function index(){

        $data['orders'] = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.user_id', 'inner')
        ->select('orders.*','users.name','users.email')
        ->where('orders.user_id', Auth::id())
        ->orderBy('orders.created_at')
        ->simplePaginate(3);
        // return view('dashboard.admin.order', $data)->with('i', (request()->input('page', 1) - 1) * 10);
        return view('dashboard.user.order', $data)->with('i', (request()->input('page', 1) - 1) * 3);
    }

    function order(Request $request){

        $request->validate([
            'voucher_file' => 'required',
        ],[
            'required' => '* Required'
        ]);

        $name = time().'_'.$request->file('voucher_file')->getClientOriginalName();

        $filePath = $request->file('voucher_file')->storeAs('uploads/vouchers', $name, 'public');

        $user_id = Auth::user()->id;
        $order_code = "REFODR-" .date('Ymdhs')."-".$user_id."GM";

        $product_id = $request->product_id;
        $quantity = $request->quantity;

        $order = new Order;

        $order->user_id = $user_id;
        $order->order_code = $order_code;
        $order->total = $request->total;
        $order->file_name = $name;
        $order->file_uri = '/storage/' . $filePath;
        $query = $order->save();

        $data = [];
        $count = count($request->pid);
        if ($count == 1){
            // $pid = $request->pid[0];
            // $price = $request->price[0];
            // $subtotal = $request->subtotal[0];
            // $quantity = $subtotal / $price;
            $data = [
                'order_id' => $order->id,
                'product_id' => $request->pid[0],
                'order_code' => $order_code,
                'product_price' => $request->price[0],
                'product_subtotal' => $request->subtotal[0],
                'product_quantity' => $request->subtotal[0]/$request->price[0]
            ];
        }else if ($count > 1){
            for($i = 0; $i < $count; $i++){
                $data[] = [
                    'order_id' => $order->id,
                    'product_id' => $request->pid[$i],
                    'order_code' => $order_code,
                    'product_price' => $request->price[$i],
                    'product_subtotal' => $request->subtotal[$i],
                    'product_quantity' => $request->subtotal[$i]/$request->price[$i]
                ];
            }
        }
        DB::table('orders_products')->insert($data);
        if($query){
            session()->forget('cart');
            return redirect()->back()->with('success', 'Order placed successfully');
        }else{
            return redirect()->back()->with('fail', 'Something went wrong');
        }
    }

    function cart(){
        return view('dashboard.user.cart');
    }

    function checkout(){
        return view('dashboard.user.checkout');
    }

    function order_item($id){
        $data['order_items'] = DB::table('orders as o')
                        ->join('users as u' ,'u.id', '=', 'o.user_id', 'inner')
                        ->join('orders_products as op' ,'o.id', '=', 'op.order_id', 'inner')
                        ->join('products as p' ,'p.id', '=', 'op.product_id', 'inner')
                        ->select('u.name','u.email', 'o.order_code', 'o.order_status','o.created_at', 'p.*', 'op.*')
                        ->where('o.id', $id)->get();
      
        return view('dashboard.user.order_view', $data);
    }
}
