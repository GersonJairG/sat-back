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
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PATCH, PUT,DELETE ");
header("Access-Control-Allow-Origin: *");


Route::get('/', function () {
    return view('welcome');
});

Route::get('/probando','Auth\loginController@getPermissionsByRole');


Route::get('/show-feedback/{idFirebase}','MailController@showFeedback');
Route::get('/show-token-user/{token}','MailController@showLoginToken');


Route::post('/feedback','MailController@registerFeedback');
