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
Route::get('/display', 'EventsController@show')->name('displayEvents');
Route::get('/create', 'EventsController@create')->name('newDate');
Route::post('/store', 'EventsController@store')->name('saveDate');
Route::post('/update/{id}', 'EventsController@update')->name('updateDate');
Route::get('/edit/{id}', 'EventsController@edit')->name('editDate');

Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/login', function () {
    return view('pages.login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
