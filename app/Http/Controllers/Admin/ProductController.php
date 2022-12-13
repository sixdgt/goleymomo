<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use DataTables;

class ProductController extends Controller
{
    // product list
    public function index(){
        return view('dashboard.admin.product');
    }

    // add new product
    public function add_product(Request $request){
        $validator = \Validator::make($request->all(), [
            'product_title' => 'required|string',
            'product_description' => 'required|string',
            'product_price' => 'required|string',
            'product_image' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            if($request->file('product_image')) {
                $file_name = time().'_'.$request->file('product_image')->getClientOriginalName();
                $file_path = $request->file('product_image')->storeAs('uploads/product_image', $file_name, 'public');
            
                $product = new Product;
                $product->product_title = $request->product_title;
                $product->product_description = $request->product_description;
                $product->product_price = $request->product_price;
                $product->product_image = '/storage/' . $file_path;
                $query = $product->save();
            
                if(!$query){
                    return response()->json(['code'=>0, 'msg' => 'Opss! something went wrong']);
                }else{
                    return response()->json(['code'=>1, 'msg'=>'Added successfully']);
                }
            }
        }
    }

    // get all products
    public function get_product_list(){
        $product = Product::all();
        return DataTables::of($product)
        ->addIndexColumn()
        ->addColumn('actions', function($row){
            return '<div class="text-center">
                        <button class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="editProduct" data-target="#myModal">Edit</button>
                        <button class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteProduct">Delete</button>
                    </div>';
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    // get product details
    public function get_product_details(Request $request){
        $product_id = $request->product_id;

        $product_details = Product::find($product_id);
        
        return response()->json(['details' => $product_details]);
    }

    // update products
    public function update_product_details(Request $request){
        $product_id = $request->pid;
        
        $validator = \Validator::make($request->all(), [
            'product_title' => 'required|string',
            'product_description' => 'required|string',
            'product_price' => 'required|string',
        ]);

        if(!$validator->passes()){
            return response()->json(['code'=>0, 'error'=> $validator->errors()->toArray()]);
        }else{
            $product = Product::find($request->pid);
            $product->product_title = $request->product_title;
            $product->product_description = $request->product_description;
            $product->product_price = $request->product_price;
            $query = $product->save();
            if($query){
                return response()->json(['code'=> 1, 'msg'=> 'product title updated']);
            }else{
                return response()->json(['code'=>0, 'msg'=> 'Something went wrong']);
            }
        }
    } 
    
    // delete product
    public function delete_product(Request $request){
        $product_id = $request->product_id;
        $query = Product::find($product_id)->delete();

        if($query){
            return response()->json(['code'=> 1, 'msg' => 'Product has been deleted from the database']);
        }else{
            return response()->json(['code'=>0, 'msg'=>'Something went wrong']);
        }
    }
}
