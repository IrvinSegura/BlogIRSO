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

Route::get('publicacion', [PublicationController::class, 'index'])->name('formulario');
Route::post('publicacion', [PublicationController::class, 'hola1'])->name('publication');

Route::get('admin/json', [PublicationController::class, 'generarJson'])->name('json');

Route::get('obtener/comentario', [CommentController::class, 'crearComentario'])->name('comentario');

Route::get('admin/usuarios', [UsersController::class, 'mostrarUsuarios'])->name('usuarios');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/perfil', [UsersController::class, 'perfilAdmin'])->name('perfil');
Route::get('admin/perfil', [PublicationController::class, 'publicacionPerfil'])->name('perfil');

Route::get('admin/roles', [UsersController::class, 'mostrarRoles'])->name('roles');

Route::get('admin/estadisticas', [UsersController::class, 'mostrarEstadisticas'])->name('estadisticas');

Route::get('index', function(){
    return view('tables');
});