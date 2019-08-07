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

// Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::middleware(['auth'])->group(function () {
  Route::get('/dashboard', 'DashboardController@index');

  Route::get('/profile', 'Profile\ProfileController@index');

  Route::get('/customers', 'CustomersController@index');

  Route::get('/customer/{id}', 'CustomersController@customer');

  Route::resource('cement-brands', 'CementBrandsController');

  Route::resource('cement', 'CementController');

  Route::resource('rod', 'RodsController');

  Route::resource('rod-brands', 'RodBrandsController');

  Route::resource('daily-costs', 'DailyCostsController');

  Route::post('/get-customer-template', function(){
    $html = view('templates.customer', compact('user'))->render();
    return response()->json(['success'=> $html]);
  });
});

Route::middleware(['auth', 'auth.admin'])->group(function () {
  Route::get('/admin', function(){
    return 'you are admin';
  });

  Route::resource('salaries', 'SalariesController');
});
