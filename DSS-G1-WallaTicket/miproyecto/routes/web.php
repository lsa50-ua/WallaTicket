<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\LocalesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EntradasController;
use App\Http\Controllers\ReseñasController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [EventosController::class, 'indexPrincipal'])->name('inicio');



//RUTAS PARA EVENTOS
Route::get('/eventos', [EventosController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{id}', [EventosController::class, 'show'])->name('eventos.show');
Route::delete('/eventos/{id}', [EventosController::class, 'destroy'])->name('eventos.destroy');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/locales/create', [LocalesController::class, 'create'])->name('locales.create');
    Route::put('/locales/{id}', [LocalesController::class, 'update'])->name('locales.update');
    Route::get('/locales/{id}/editar', [LocalesController::class, 'edit'])->name('locales.edit');
    Route::delete('/locales/{id}', [LocalesController::class, 'destroy'])->name('locales.destroy');
});
//RUTAS PARA LOCALES
Route::middleware(['auth'])->group(function () {
    Route::get('/locales', [LocalesController::class, 'index'])->name('locales.index');    
    Route::post('/locales', [LocalesController::class, 'store'])->name('locales.store');
    Route::get('/locales/{id}', [LocalesController::class, 'show'])->name('locales.show');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/entradas/create', [EntradasController::class, 'create'])->name('entradas.create');
    Route::put('/entradas/{id}', [EntradasController::class, 'update'])->name('entradas.update');
    Route::get('/entradas/{id}/editar', [EntradasController::class, 'edit'])->name('entradas.edit');
    Route::delete('/entradas/{id}', [EntradasController::class, 'destroy'])->name('entradas.destroy');
});
Route::middleware(['auth'])->group(function () {
//RUTAS PARA ENTRADAS
Route::post('/entradas', [EntradasController::class, 'store'])->name('entradas.store');
Route::get('/entradas', [EntradasController::class, 'index'])->name('entradas.index');
Route::get('/entradas/comprar/{id}', [EntradasController::class, 'comprar'])->name('entradas.comprar');
Route::get('/entradas/{id}', [EntradasController::class, 'show'])->name('entradas.show');
Route::get('/entradas/{id}/descargar', [EntradasController::class, 'descargarEntrada'])->name('entradas.descargar');
});

Route::middleware(['auth'])->group(function () {
    //RUTAS PARA ENTRADAS DE LOS USUARIOS
    Route::get('/misEntradas', [EntradasController::class, 'entradasUsu'])->name('misEntradas.index');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/reseñas/create', [ReseñasController::class, 'create'])->name('reseñas.create');
    Route::put('/reseñas/{id}', [ReseñasController::class, 'update'])->name('reseñas.update');
    Route::get('/reseñas/{id}/edit', [ReseñasController::class, 'edit'])->name('reseñas.edit');
    Route::delete('/reseñas/{id}', [ReseñasController::class, 'destroy'])->name('reseñas.destroy');
});

Route::middleware(['auth'])->group(function () {
    //RUTAS PARA RESEÑAS
    Route::post('/reseñas', [ReseñasController::class, 'store'])->name('reseñas.store');
    Route::get('/reseñas', [ReseñasController::class, 'index'])->name('reseñas.index');
    Route::get('/reseñas/{id}', [ReseñasController::class, 'show'])->name('reseñas.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/informacion', [UsersController::class, 'informacion'])->name('informacion');
Route::get('/contact', [UsersController::class, 'contact'])->name('contact');

//RUTAS PARA USUARIOS
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/usuarios', [UsersController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/{id}', [UsersController::class, 'show'])->name('usuarios.show');
    Route::delete('/usuarios/{id}', [UsersController::class, 'destroy'])->name('usuarios.destroy');
});



//RUTAS PARA PROFILE
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('perfil.show');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
