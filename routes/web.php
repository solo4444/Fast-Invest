<?php

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

Route::get('/', 'HomeController@home')->name('login');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/transfer', 'HomeController@transfer')->name('transfer');
Route::get('/account', 'HomeController@account')->name('account');
Route::get('/transactionHistory', 'TransactionController@show')->name('show');
Route::get('/account', 'HomeController@account')->name('account');
//Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::post('transactionsStore', 'TransactionController@store')->name('store');
Route::resource('transactions', 'TransactionController')->only('store', 'show');
Auth::routes();
