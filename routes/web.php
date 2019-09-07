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
Route::get('Dashbord/medics', function () {
    return view('Dashbord.medics');
});
Route::get('Dashbord/adduser', function () {
    return view('Dashbord.adduser');
});





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Dashbord/index', 'HomeController@index2')->name('index');

Route::resource('/Dashbord/users', 'UserController');
Route::get('/Dashbord/designAsadmin/{id}', 'UserController@designAsAdmin');


//Auth::routes();


/**
 * Login Route(s)
 */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
/**
 * Register Route(s)
 */
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
/**
 * Password Reset Route(S)
 */
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
/**
 * Email Verification Route(s)
 */
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
