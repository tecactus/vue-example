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
    return view('welcome');
});

Route::get('/presentacion', function () {
    return view('presentation');
});

Route::get('/instancias', 'DemoController@instancias');

Route::get('/selects-dependientes', 'DemoController@selects1');
Route::get('/selects-dependientes-2', 'DemoController@selects2');
Route::get('/selects-dependientes-3', 'DemoController@selects3');
Route::get('/selects-dependientes-4', 'DemoController@selects4');

Route::get('/tipo-mascotas', function () {
	$tipos = \App\TipoMascota::all();
	return response()->json($tipos);
});

Route::get('/tipo-mascotas/{tipoId}/razas', function ($tipoId) {
	$tipo = \App\TipoMascota::find($tipoId);
	return response()->json($tipo->razas);
});


Route::get('/mascotas', function () {
	$mascotas = \App\Mascota::with('raza.tipo_mascota')->get();
	return response()->json($mascotas);
});

Route::post('/mascotas', 'DemoController@guardarMascota');

Auth::routes();

Route::get('/home', 'HomeController@index');
