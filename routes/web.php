<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FteureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
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

Route::get('/','App\Http\Controllers\HomeController@index')->name('first');
Route::post('/temp','App\Http\Controllers\HomeController@temp')->name('send_post');
Route::get('verification','App\Http\Controllers\HomeController@verification')->name('verification');
Route::post('verification','App\Http\Controllers\HomeController@send_verification')->name('send.verification');
Route::get('login','App\Http\Controllers\HomeController@login_dashboard')->name('login');
Route::post('login_dashboard','App\Http\Controllers\HomeController@login_dashboard_post')->name('login_dashboard_post');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/','App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('logout','App\Http\Controllers\HomeController@logout')->name('logout');
    Route::get('edit_profile','App\Http\Controllers\HomeController@edit_profile')->name('edit_profile');
    Route::post('update_profile','App\Http\Controllers\HomeController@update_profile')->name('update_profile');
    Route::resource('fteures',FteureController::class);
    Route::resource('sliders',SliderController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('prodcuts',ProductController::class);
    Route::get('system_info',[HomeController::class,'system_info'])->name('system_info');
    Route::get('paid_info',[HomeController::class,'paid_info'])->name('paid_info');

    Route::post('get_setting_post',[HomeController::class,'get_setting_post'])->name('get_setting_post');
    Route::get('category_update',[CategoryController::class,'update_status'])->name('cats.update.status');
    Route::get('product_update',[ProductController::class,'update_status'])->name('products.update.status');
    Route::get('product_update_best',[ProductController::class,'update_status_best'])->name('products.update.best');

   

    Route::get('sliders_update',[SliderController::class,'update_status'])->name('sliders.update.status');


});