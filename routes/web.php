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

Route::get('Dashbord/index', function () {
    return view('Dashbord.index');
});

Route::get('Dashbord/login', function () {
    return view('Dashbord.login');
});

Route::get('Dashbord/register', function () {
    return view('Dashbord.register');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
