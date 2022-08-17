<?php

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
Route::get('login_dashboard','App\Http\Controllers\HomeController@login_dashboard')->name('login_dashboard');
Route::post('login_dashboard','App\Http\Controllers\HomeController@login_dashboard_post')->name('login_dashboard_post');

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::get('/','App\Http\Controllers\HomeController@dashboard')->name('dashboard');
    Route::get('logout','App\Http\Controllers\HomeController@logout')->name('logout');
    Route::get('edit_profile','App\Http\Controllers\HomeController@edit_profile')->name('edit_profile');
    Route::post('update_profile','App\Http\Controllers\HomeController@update_profile')->name('update_profile');
});