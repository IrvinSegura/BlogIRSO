<?php

use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

Route::get('/home', [UsersController::class, 'hola'])->name('home');

Route::get('hola/formulario', [PublicationController::class, 'index'])->name('formulario');
Route::post('hola/formulario', [PublicationController::class, 'hola1'])->name('publication');

Route::get('admin/json', [PublicationController::class, 'generarJson'])->name('json');

Route::get('hola/comentario', [CommentController::class, 'crearComentario'])->name('comentario');