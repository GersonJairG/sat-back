<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PATCH, PUT,DELETE ");
header("Access-Control-Allow-Origin: *");



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//dependences
Route::prefix('dependences')->group(function () {
    Route::get('/', 'DependenciesController@index');//listo
    Route::post('/new', 'DependenciesController@store');//listo(postman pone problema)
    Route::get('/{id}', 'DependenciesController@show');//listo
    Route::patch('/{id}', 'DependenciesController@update');//problemas
    Route::delete('/{id}', 'DependenciesController@destroy');//listo
});
//services
Route::prefix('services')->group(function () {
    Route::get('/', 'ServicesController@index');//
    Route::post('/new', 'ServicesController@store');//
    Route::get('/{id}', 'ServicesController@show');//
    Route::patch('/{id}', 'ServicesController@update');//
    Route::delete('/{id}', 'ServicesController@destroy');//
});
//service_types
Route::prefix('service-types')->group(function () {
    Route::get('/', 'ServiceTypesController@index');//traigo el tipo de servicio y la dependencia a la cual pertence 
    Route::post('/new', 'ServiceTypesController@store');//
    Route::get('/{id}', 'ServiceTypesController@show');//
    Route::get('/forDependence/{id}', 'ServiceTypesController@getForDependence');
    Route::get('/findServiceType/{id}', 'ServiceTypesController@findServiceType');
    
    Route::patch('/{id}', 'ServiceTypesController@update');//
    Route::delete('/{id}', 'ServiceTypesController@destroy');//
});
//queue_types
Route::prefix('queue-types')->group(function () {
    Route::get('/', 'QueueTypesController@index');//
    Route::post('/new', 'QueueTypesController@store');//
    Route::get('/{id}', 'QueueTypesController@show');//
    Route::patch('/{id}', 'QueueTypesController@update');//
    Route::delete('/{id}', 'QueueTypesController@destroy');//
});
//turns
Route::prefix('turns')->group(function () {
    Route::get('/', 'TurnsController@index');//
    Route::post('/new', 'TurnsController@store');//
    Route::get('/{id}', 'TurnsController@show');//
    Route::get('/find/{id}', 'TurnsController@findForIdFirebase');//
    Route::patch('/{id}', 'TurnsController@update');//
    Route::delete('/{id}', 'TurnsController@destroy');//
});

//users
Route::prefix('users')->group(function () {
    Route::get('/', 'UserController@index');//listo
    Route::get('/all-index', 'UserController@allIndex');//listo
    Route::post('/new', 'UserController@store');//listo(postman pone problema)
    Route::post('/token', 'UserController@storeToken');//
    Route::get('/{id}', 'UserController@show');//listo
    Route::get('/findUsers/{id}', 'UserController@showFindUsers');//Busca un usuario por su id
    Route::get('/common/{id}', 'UserController@showUsersCommon');//usuarios que tengan state 1 y rol 3 para mostrarlo en el email autocompletable
    Route::get('/email/{email}', 'UserController@findUserForEmail');//retorna un usuario por el email
    Route::patch('/{id}', 'UserController@update');//problemas
    Route::delete('/{id}', 'UserController@destroy');//listo
});


Route::get('/get-semesters','PruebasController@getSemesters');
Route::post('/send-mail','MailController@postContact');
Route::post('/login','Auth\LoginController@login');
Route::post('/login-movil','Auth\LoginController@loginMovil');
