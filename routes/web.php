<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\SalesController;
use App\Http\Controllers\User\UserProductController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Marketing\MarketingController;
use App\Http\Controllers\Marketing\SalesPartnerController;
use App\Http\Controllers\SubscriberController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LandingPageController::class, 'index'])->name('landing.page');

Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::post('/subscribe', [SubscriberController::class, 'subscribe'])->name('subscribe');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('user')->name('user.')->group(function(){
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/check', [UserController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:web', 'PreventBackHistory'])->group(function(){
        Route::get('/home', [UserController::class, 'home'])->name('home');
        Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/profile-update', [UserController::class, 'profile_update'])->name('profile.update');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::post('/location', [UserController::class, 'todays_location'])->name('todays_location');

        Route::get('/settings',[UserController::class, 'setting'])->name('setting.index');
        Route::post('/update-password',[UserController::class, 'update_password'])->name('password.update');
        // product
        Route::get('orders',[OrderController::class, 'index'])->name('order.index');
        Route::get('orders/{id}',[OrderController::class, 'order_item'])->name('order.view');

        Route::post('/product/order',[OrderController::class, 'order'])->name('order.product');
        // Route::get('/cart', [OrderController::class, 'cart'])->name('order.cart');
        // Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');

        Route::get('/products',[UserProductController::class, 'index'])->name('product.index');

        Route::get('/cart', [UserProductController::class, 'cart'])->name('cart');

        Route::get('/add-to-cart/{id}', [UserProductController::class, 'addToCart'])->name('add.to.cart');

        Route::patch('/update-cart', [UserProductController::class, 'update'])->name('update.cart');

        Route::delete('/remove-from-cart', [UserProductController::class, 'remove'])->name('remove.from.cart');

        // sales
        Route::get('sales',[SalesController::class, 'index'])->name('sales.index');
        Route::post('/entry',[SalesController::class, 'salesEntry'])->name('sales.entry');
        Route::get('/commissions',[UserController::class, 'commission'])->name('commission.index');

        Route::get('/partners', [UserController::class, 'partner'])->name('partners');
        Route::post('/partners/add', [UserController::class, 'partner_add'])->name('partners.add');
    });
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function(){
        Route::view('/', 'dashboard.admin.login')->name('login');
        Route::post('/check', [AdminController::class, 'check'])->name('check');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function(){
        Route::view('/home', 'dashboard.admin.home')->name('home');
        // product
        Route::get('products',[ProductController::class, 'index'])->name('product.index');
        Route::post('add-product', [ProductController::class, 'add_product'])->name('product.add');
        Route::get('product-list', [ProductController::class, 'get_product_list'])->name('product.list');
        Route::post('product-details', [ProductController::class, 'get_product_details'])->name('product.details');
        Route::post('product-update', [ProductController::class, 'update_product_details'])->name('product.update');
        Route::post('product-delete', [ProductController::class, 'delete_product'])->name('product.delete');

        // users 
        Route::get('users',[AdminController::class, 'userList'])->name('user.index');
        Route::post('user/verify',[AdminController::class, 'user_verify'])->name('user.verify');
        Route::post('users/password',[AdminController::class, 'change'])->name('user.password');
        Route::post('users/add', [AdminController::class, 'partner_add'])->name('users.add');


        // order
        Route::get('orders',[AdminController::class, 'orderList'])->name('order.index');
        Route::get('orders/{id}',[AdminController::class, 'order_item'])->name('order.view');
        Route::post('orders/status-update',[AdminController::class, 'order_status_update'])->name('order.status');

        Route::get('commissions',[AdminController::class, 'commission'])->name('commission.index');
        Route::post('commissions/pay',[AdminController::class, 'commission_pay'])->name('commission.pay');
        Route::post('commissions/partner-pay',[AdminController::class, 'commission_partner_pay'])->name('commission.partnerpay');
        Route::get('commissions/details',[AdminController::class, 'commission_detail'])->name('commission.detail');
        Route::get('commissions/details/{id}',[AdminController::class, 'commission_detail_view'])->name('commission.detail.view');
        Route::get('commissions/{id}',[AdminController::class, 'commission_view'])->name('commission.view');
        Route::post('commissions/add',[AdminController::class, 'commission_add'])->name('commission.add');
        Route::post('commissions/update',[AdminController::class, 'commission_udpate'])->name('commission.update');
        Route::post('commissions/add-user',[AdminController::class, 'user_commission_add'])->name('commission.user');
        
        // landing
        Route::get('landing-page',[AdminController::class, 'landing'])->name('landing.index');
        Route::post('landing-page/add',[AdminController::class, 'landing_add'])->name('landing.add');
    });
});

// Route::prefix('marketing')->name('marketing.')->group(function(){
//     Route::middleware(['guest:marketing', 'PreventBackHistory'])->group(function(){
//         Route::view('/login', 'dashboard.marketing.login')->name('login');
//         Route::view('/register', 'dashboard.marketing.register')->name('register');
//         Route::post('/create', [MarketingController::class, 'create'])->name('create');
//         Route::post('/check', [MarketingController::class, 'check'])->name('check');
//     });

//     Route::middleware(['auth:marketing', 'PreventBackHistory'])->group(function(){
//         Route::view('/home', 'dashboard.marketing.home')->name('home');
//         Route::post('/logout', [MarketingController::class, 'logout'])->name('logout');

//         // sales partner
//         Route::get('/partners', [SalesPartnerController::class, 'index'])->name('partners');
//     });
// });