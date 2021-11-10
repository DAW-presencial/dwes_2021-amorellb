<?php

use App\Http\Controllers\HelloController;
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

// Ejecutamos una función para la ruta /hola/{name}
//Route::get('/hola/{name}', function (string $name) {
//    return "Hello world {$name}";
//});

// Ruta para el controlador invocable
//Route::get('/hola/{name}', HelloController::class);

// Ruta para el método (al no ser invocable, debemos llamarlo de forma explícita)
Route::get('/hola/{name}', [HelloController::class, "saludo"]);
