<?php

use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
    Route::get('/', function () {
        return view('auth.login');
    });

    Route::get('publicacion', [PublicationController::class, 'index'])->name('formulario');
    Route::post('publicacion', [PublicationController::class, 'hola1'])->name('publication');

    Route::get('admin/json', [PublicationController::class, 'generarJson'])->name('json');

    Route::get('obtener/comentario', [CommentController::class, 'crearComentario'])->name('comentario');

    Route::get('admin/usuarios', [UsersController::class, 'mostrarUsuarios'])->name('usuarios');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('admin/perfil', [UsersController::class, 'perfilAdmin'])->name('perfil');
    Route::get('admin/perfil', [PublicationController::class, 'publicacionPerfil'])->name('perfil');

    Route::get('admin/roles', [UsersController::class, 'mostrarRoles'])->name('roles');

    Route::get('admin/estadisticas', [UsersController::class, 'mostrarEstadisticas'])->name('estadisticas');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});
