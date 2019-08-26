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


Route::get('Dashbord/login', function () {
    return view('Dashbord.login');
});

Route::get('Dashbord/register', function () {
    return view('Dashbord.register');
});

Route::get('Dashbord/users', function () {
    return view('Dashbord.users');
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Dashbord/index', 'HomeController@index2')->name('index');

Route::resource('/Dashbord/users', 'UserController');
Route::get('/Dashbord/designAsadmin/{id}', 'UserController@designAsAdmin');