<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Acceso Login

Route::get('/', function () {
    //return view('welcome');
    //return App\clientes::all();
    return view('home');
});

//P2
//Route::get('/', 'Auth\LoginController@getLogin');
//Route::post('/', ['as' =>'/', 'uses' => 'Auth\LoginController@postLogin']);
//Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

//P3
// route to show the login form
//Route::get('/', array('clientes' => 'HomeController@showLogin'));
// route to process the form
//Route::post('/', array('clientes' => 'HomeController@doLogin'));

//P4
/*Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
*/

//P5
/*
Route::controllers([
    'auth' => 'Auth\LoginController',
]);
*/
//Acceso Home 
/*
Route::get('home/', function () {
    return view('home');
});
*/
//Acceso Transacciones 
/*
Route::get('transactions/', function () {
    return view('transactions');
});*/



Auth::routes();

Route::get('/home', 'HomeController@index');

// Datos Base
//Route::post('clientes/create', array('middleware'=>'auth', 'uses'=> 'ClientesController@create'));  //Guardar datos

/*
Route::resource('clientes', 'ClientesController');

Route::resource('clientes', 'ClientesController', ['only' => [
    'index', 'show'
]]);
*/

Route::resource('clientes', 'ClientesController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);


Route::post('/clientes.store', 'ClientesController@store');

Route::resource('pagos', 'PagosController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);

Route::post('/pagos.store', 'PagosController@store');

Route::get('/transactions/{estatus}', 'PagosController@index');

Route::get('/procesar', 'PagosController@procesar');



