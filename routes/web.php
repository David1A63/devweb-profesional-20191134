<?php

use Illuminate\Support\Facades\Route;

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

//Enrutamiento a las plantillas de laravel
Route::get('/principal', function(){
    return view('Vistas.index');
});

//Enrutamiento de Errores
Route::get('/error-400', function () {
    abort(400, 'Bad request');
});

Route::get('/error-404', function () {
    abort(404, 'Not found');
});

Route::get('/error-500', function () {
    abort(500, 'Internal server error');
});

//Se agregó una nueva ruta de acceso para nuestro crud
//Al no especificar el metodo se abrira index por default
Route::resource('/articulos', 'App\Http\Controllers\ArticuloController');

Route::resource('/zapatos', 'App\Http\Controllers\ZapatoController');
