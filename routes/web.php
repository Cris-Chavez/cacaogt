<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Mail\NotificacionesMailable;
use Illuminate\Support\Facades\Mail;

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
    return view('auth.login');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('empleado', EmpleadoController::class);

Route::resource('rol', RolController::class);

Route::resource('empresa', EmpresaController::class);

Route::resource('usuario', UserController::class);

Route::resource('heroe', ApiController::class);

Route::get('notificacion', function () {

    $correo = new NotificacionesMailable();

    Mail::to('crist.reu1990@gmail.com')->send($correo);

    return 'mensaje enviado';
    
});


