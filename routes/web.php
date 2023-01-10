<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FteureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HowItWorkController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\StripePaymentController;
use App\Models\HowItWork;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('login','App\Http\Controllers\HomeController@login_dashboard')->name('login');
Route::get('register','App\Http\Controllers\HomeController@register')->name('register');
Route::post('post_register','App\Http\Controllers\HomeController@post_register')->name('post_register');


Route::post('login_dashboard','App\Http\Controllers\HomeController@login_dashboard_post')->name('login_dashboard_post');
Route::post('add_to_cart',[CartController::class,'addToCart'])->name('add.to.cart');
Route::get('cart',[CartController::class,'index'])->name('get_cart');
Route::get('category/{id}',[HomeController::class,'category'])->name('category');


Route::get('paypal',function(){
    return view('front.paypal');
})->name('paypal');

Route::PATCH('update_cart',[CartController::class,'update'])->name('update_cart');
Route::get('remove-from-cart',[CartController::class,'remove'])->name('remove.from.cart');
Route::get('order_detiels/{id}',[OrderController::class,'get_order'])->name('get_order');
Route::get('returns_exchange',[HomeController::class,'returns_exchange'])->name('returns_exchange');
Route::get('about',[HomeController::class,'about'])->name('about');
Route::get('product/{id}',[HomeController::class,'single_product'])->name('single_product');
Route::get('usage_policy',[HomeController::class,'usage_policy'])->name('usage_policy');
Route::post('handle-payment', [PayPalPaymentController::class,'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PayPalPaymentController::class,'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PayPalPaymentController::class,'paymentSuccess'])->name('success.payment');
Route::get('track_order', [HomeController::class,'track_order'])->name('track_order');
Route::post('track_order_post', [HomeController::class,'track_order_post'])->name('track_order_post');




Route::controller(StripePaymentController::class)->group(function(){
    Route::get('stripe', 'stripe')->name('stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('account','App\Http\Controllers\HomeController@account')->name('account');
});


Route::group(['middleware' => ['auth','is_admin'], 'prefix' => 'dashboard'], function () {
    Route::get('/','App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('logout','App\Http\Controllers\HomeController@logout')->name('logout');
    Route::get('edit_profile','App\Http\Controllers\HomeController@edit_profile')->name('edit_profile');
    Route::post('update_profile','App\Http\Controllers\HomeController@update_profile')->name('update_profile');
    Route::resource('fteures',FteureController::class);
    Route::resource('sliders',SliderController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('prodcuts',ProductController::class);
    Route::resource('how_it_works',HowItWorkController::class);
    Route::post('updateOrder',[HowItWorkController::class,'updateOrder'])->name('menu_update');
    Route::get('system_info',[HomeController::class,'system_info'])->name('system_info');
    Route::get('paid_info',[HomeController::class,'paid_info'])->name('paid_info');
    Route::get('about_page',[HomeController::class,'about_page'])->name('about_page');
    Route::get('usage_policy_page',[HomeController::class,'usage_policy_page'])->name('usage_policy_page');
    Route::get('returns_exchange',[HomeController::class,'returns_exchange_page'])->name('returns_exchange_page');

    Route::post('get_setting_post',[HomeController::class,'get_setting_post'])->name('get_setting_post');
    Route::get('category_update',[CategoryController::class,'update_status'])->name('cats.update.status');
    Route::get('product_update',[ProductController::class,'update_status'])->name('products.update.status');
    Route::get('product_update_best',[ProductController::class,'update_status_best'])->name('products.update.best');
    Route::get('sliders_update',[SliderController::class,'update_status'])->name('sliders.update.status');
});