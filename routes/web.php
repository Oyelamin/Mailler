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

// Mail Router
Route::resource('mail','MailController'); //All Mail Messages

Route::post('/send/mail','SendMailController@index'); //Send Mail
Route::post('mail/reply/{inbox}','ReplyController@index'); //Reply Mail
Route::get('/check','CheckController@index'); //Check for mail
Route::get('/fetch','FetchInboxController@index'); //Fetch Mail2