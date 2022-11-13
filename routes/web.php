<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuariosController;

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

Route::group(['middleware' => 'web'], function () {
	/* Return to login screen after logout.
	Direct transitions to logout/login
	*/
	Route::get('/', HomeController::class . '@index');
	Auth::routes();
	Route::get('/home', HomeController::class . '@index');
});

Route::get('/usuarios', UsuariosController::class . '@index')->name('usuarios.list')->middleware('auth');
Route::get('/usuarios/new', UsuariosController::class . '@new')->name('usuarios.new')->middleware('auth');
Route::post('/usuarios/add', UsuariosController::class . '@add')->name('usuarios.add')->middleware('auth');
Route::get('/usuarios/{id}/edit', UsuariosController::class . '@edit')->name('usuarios.edit')->middleware('auth');
Route::post('/usuarios/update/{id}', UsuariosController::class . '@update')->name('usuarios.update')->middleware('auth');
Route::delete('/usuarios/delete/{id}', UsuariosController::class . '@delete')->name('usuarios.delete')->middleware('auth');