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

// rutas de empleados manualmente
// los envialos a los controladores y metodos
// Route::get('/empleados', [EmpleadosController::class, 'index']);

// podemos crear un resource o repositorio de rutas con
// con middleware le dicimos que proteja las rutas con autenticacion
Route::resource('empleados', 'App\Http\Controllers\EmpleadosController')->middleware('auth');

// deshabilitaremos algunas funciones por defecto del auth
Auth::routes(['register'=> false, 'reset' => false]);

Route::get('/home', [EmpleadosController::class, 'index'])->name('home'); 

Route::middleware(['middleware' => 'auth'])->group(function () {
    Route::get('/', [EmpleadosController::class, 'index'])->name('home'); 
});
