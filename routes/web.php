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

Route::get('contact', function () {
    return view('contact');
});

Route::get('medicsFront', function () {
    return view('medicsFront');
});






Route::get('Dashbord/profile/{id}', 'ProfileController@index');

Route::get('Dashbord/vente', 'VenteController@index');

Route::get('dashbord/searchFront', 'MedicamentController@medicsearch');





Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Dashbord/index', 'HomeController@index2')->name('index');

Route::resource('/Dashbord/users', 'UserController');
Route::resource('/Dashbord/fournisseurs', 'FournisseurController');



Route::get('/Dashbord/designAsadmin/{id}', 'UserController@designAsAdmin');
Route::get('/Dashbord/desiableAdmin/{id}', 'UserController@desiableAdmin');



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



// MEDICAMENT

Route::get('medicament/index','MedicamentController@index');//

Route::post('medicament/insert','MedicamentController@insert');//

Route::get('medicaments/gerer','MedicamentController@gerer');//

Route::get('medicament/edite/{idMedic}','MedicamentController@edite');//

Route::put('medicament/update/{idMedic}','MedicamentController@update');//

Route::get('medicament/delete/{idMedic}','MedicamentController@delete');//

Route::get('medicament/details/{idMedic}','MedicamentController@details');//

Route::get('medicament/medicsmin','MedicamentController@medicsmin');//
Route::get('medicament/medicsrupture','MedicamentController@medicsrupture');//











// LOT

Route::get('lot/index/{idM}','LotController@index');//

Route::post('lot/insert/{idM}','LotController@insert');//

Route::get('lots/gerer/{idM}','LotController@gerer');//

Route::get('lot/edite/{idLot}','LotController@edite');//

Route::put('lot/update/{idLot}','LotController@update');//

Route::get('lot/delete/{idLot}','LotController@delete');//





Route::get('lot/etat/{idL}','LotController@etat');//ajax

Route::get('rechercheParDate/{mois}/{annee}/{idM}','LotController@rechercheParDate');//ajax

Route::get('rechercheParNom/{nomM}','MedicamentController@rechercheParNom');//ajax

Route::get('rechercheParClass/{nomC}','MedicamentController@rechercheParClass');//ajax

Route::get('rechercheDosageUnit/{forme}','MedicamentController@rechercheDosageUnit');//ajax

Route::get('rechercheForme/{nomF}','MedicamentController@rechercheForme');//ajax
