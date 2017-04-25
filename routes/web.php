<?php

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('clientes', 'ClientesController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);
Route::post('/clientes.store', 'ClientesController@store');

Route::resource('pagos', 'PagoController', ['except' => [
    'create', 'store', 'update', 'destroy'
]]);
Route::post('/pagos.store', 'PagoController@store');
Route::get('/transactions/{estatus}', 'PagoController@index');
Route::get('/toProcess', 'PagoController@toProcess');
Route::post('/pagos.process', 'PagoController@process');

Route::resource('valoresvariables', 'ValorVariableController');



