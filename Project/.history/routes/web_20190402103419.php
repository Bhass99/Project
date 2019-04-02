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
Route::get('/loginn', function () {
    return view('pages.login');
});
Auth::routes();

Route::resource('volunteer', 'VolunteerController');
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('Admin')->group(function(){
    Route::get('/display', 'EventsController@show')->name('displayEvents');
    Route::post('/store', 'EventsController@store')->name('saveDate');
    Route::patch('/update/{id}', 'EventsController@update')->name('updateDate');
    Route::delete('/delete/{id}', 'EventsController@delete')->name('deleteDate');
    Route::get('/edit/{id}', 'EventsController@edit')->name('editDate');
});