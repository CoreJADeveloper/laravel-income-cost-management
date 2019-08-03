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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', 'DashboardController@index');

  Route::get('/profile', 'Profile\ProfileController@index');

  Route::resource('cement-brands', 'CementBrandsController');

  Route::resource('cement', 'CementController');

  Route::post('/get-customer-template', function(){
    $html = view('customer', compact('user'))->render();
    return response()->json(['success'=> $html]);
  });
});

Route::middleware(['auth', 'auth.admin'])->group(function () {
  Route::get('/admin', function(){
    return 'you are admin';
  });
});
