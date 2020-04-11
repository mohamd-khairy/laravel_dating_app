<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/register', 'Auth\AuthController@postRegister');

/******* Forget Password  ********/
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/', 'HomeController@index');

Route::post('/update_profile','HomeController@update_profile');

Route::post('/add_to_likelist','HomeController@add_to_likelist');

Route::get('/profile','HomeController@profile');

Route::post('/show_profile','HomeController@show_profile');

Route::get('/message', 'HomeController@message');
Route::post('/send_message','HomeController@send_message');
Route::post('/get_message','HomeController@get_message');

Route::get('/like','HomeController@like');
Route::get('/like2','HomeController@like2');

Route::get('/people', 'HomeController@people');
Route::get('/people_female', 'HomeController@people_female');
Route::get('/people_male', 'HomeController@people_male');

Route::post('/count_noti','HomeController@count_noti');
Route::post('/get_noti','HomeController@get_noti');
Route::post('/update_noti','HomeController@update_noti');

Route::post('/search_result','HomeController@search_result');
