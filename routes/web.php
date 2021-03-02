<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadosController;

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

// rutas de empleados manualmente
// los envialos a los controladores y metodos
// Route::get('/empleados', [EmpleadosController::class, 'index']);

// podemos crear un resource o repositorio de rutas con
Route::resource('empleados', 'App\Http\Controllers\EmpleadosController');
