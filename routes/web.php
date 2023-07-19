<?php

use App\Http\Controllers\PublicationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RoleController;



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
    Route::post('admin/usuarios', [UsersController::class, 'agregarUsuario'])->name('editarUsuario');
    Route::get('admin/usuarios/editar', [UsersController::class, 'editarUsuario'])->name('agregarUsuario');
    Route::get('admin/usuarios/eliminar', [UsersController::class, 'eliminarUsuario'])->name('eliminarUsuario');
    Route::get('admin/usuarios/ocultos', [UsersController::class, 'usuariosOcultos'])->name('usuarios.ocultos');
    Route::post('admin/usuarios/restaurar', [UsersController::class, 'restaurarUsuario'])->name('usuarios.restaurar');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('admin/perfil', [UsersController::class, 'perfilAdmin'])->name('perfil');
    Route::get('admin/perfil', [PublicationController::class, 'publicacionPerfil'])->name('perfil');



    Route::get('admin/estadisticas', [UsersController::class, 'mostrarEstadisticas'])->name('estadisticas');

    Route::get('admin/categorias', [CategoryController::class, 'verCategoria'])->name('categorias');
    Route::post('admin/categorias', [CategoryController::class, 'sendCategory'])->name('categoria');
    Route::get('admin/categorias/nuevoNombre', [CategoryController::class, 'nuevoNombre'])->name('nuevoNombre');
    Route::get('admin/categorias/eliminar', [CategoryController::class, 'eliminar'])->name('eliminar');

    // ruta para adminCrearPublicaciones
    Route::get('admin/crear', [PublicationController::class, 'crearPublicaciones'])->name('publicaciones');
});
