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

//facebook authentication
Route::get('/auth/facebook', 'Auth\SocialAuthController@redirect');
Route::get('/auth/callback', 'Auth\SocialAuthController@callback');

//Contacts routing
Route::get('/contacts/', 'ContactsController@index');
Route::get('/contacts/modify/{id}', 'ContactsController@edit');
Route::get('/contacts/delete/{id}', 'ContactsController@destroy');
Route::get('/contacts/create', 'ContactsController@create');
Route::post('/contacts/store', 'ContactsController@store');
Route::group(['middleware' => 'auth'], function () {
});
