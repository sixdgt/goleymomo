<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/products', function(){
//     $data = App\Models\Product::select('id', 'product_title', 'product_description', 'product_image', 'product_price')->get();

//     $response = [
//         'status' => 200,
//         'message' => 'Success',
//         'secondary_message' => 'Product lists fetched successfully',
//         'data' => ['product_lists' => $data],
//         'error' => [
//             'validation_error' => [
//                 'status_code' => 403,
//                 'password' => 'Invalid password',
//                 'email' => 'already exist'
//             ],
//             'database_error' => [
//                 'status_code' => 500,
//                 'message' => 'Server Down'
//             ],
//         ],
//         'null_example' => null
//     ];
//     return response($response, 200)->header('Content-Type', 'application/json');;
// });