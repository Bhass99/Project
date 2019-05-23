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

Route::get('/', 'EventsController@index')->name('events');
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/footer', function () {
    return view('inc.footer');
});
Route::get('/loginn', function () {
    return view('pages.login');
});

// guests
Route::middleware('guest')->group(function(){
    Route::get('/guest/{event_id}', 'GuestController@index')->name('guest.index');
    Route::post('/guest', 'GuestController@store')->name('guest.store');
});

Route::middleware('checkAuth')->group(function() {
    Route::resource('volunteer', 'VolunteerController');
    Route::patch('/refuse/{id}', 'VolunteerController@refuse')->name('refuseUser');

});
//admin
Route::middleware('checkAdmin')->group(function(){
    Route::get('/display', 'EventsController@show')->name('displayEvents');
    Route::get('/create', 'EventsController@create')->name('createEvents');
    Route::post('/store', 'EventsController@store')->name('saveDate');
    Route::patch('/update/{id}', 'EventsController@update')->name('updateDate');
    Route::delete('/delete/{id}', 'EventsController@delete')->name('deleteDate');
    Route::get('/edit/{id}', 'EventsController@edit')->name('editDate');
});

// auth routes
// Auth::routes();

$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');