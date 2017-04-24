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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('clientes', 'ClientesController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);


Route::post('/clientes.store', 'ClientesController@store');

Route::resource('pagos', 'PagosController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);

Route::post('/pagos.store', 'PagosController@store');

Route::get('/transactions/{estatus}', 'PagosController@index');

Route::get('/toProcess', 'PagosController@toProcess');

Route::post('/pagos.process', 'PagosController@process');

Route::resource('valoresvariables', 'ValorVariableController');



