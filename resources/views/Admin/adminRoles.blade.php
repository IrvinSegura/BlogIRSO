@extends('adminlte::page')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    @if (Session::has('success'))
        <x-success-popup />
    @endif
    @if (Session::has('failed'))
        <x-failed-popup />
    @endif
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-plus">Agregar Rol</i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Rol</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ 'roles' }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre: </label>
                            <input type="text" class="form-control" id="nameRol" name="nameRol" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div><br><br>
    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card">
                <table class="table table-bordered mt-5">
                    <thead class="table-head">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="table-body">
                        @foreach ($role as $role)
                            @if ($role->deleted_at == null)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal{{ $role->id }}"><i class="fas fa-edit">Editar</i></a>

                                        <div class="modal fade" id="myModal{{ $role->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel{{ $role->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $role->id }}">
                                                            Editar
                                                            Rol</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Nombre Actual:
                                                        <label for="nombre" class="form-label">{{ $role->name }}</label>
                                                        <form action="{{ 'roles/editarNombre' }}" method="GET"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="hidden" name="id" class="form-control"
                                                                    id="id" placeholder="Id"
                                                                    value="{{ $role->id }}" readonly>
                                                                <label for="nombre" class="form-label">Nuevo
                                                                    Nombre:</label>
                                                                <input type="text" name="newRoleName" id="newRoleName"
                                                                    class="form-control">
                                                            </div>
                                                            <input type="submit" class="btn btn-primary" value="Enviar">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Cerrar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <form action="{{ 'roles/eliminar' }}" method="GET"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" class="form-control"
                                                    id="idRoleDelete" value="{{ $role->id }}">
                                                <input type="hidden" name="name" class="form-control"
                                                    id="nameRoleDelete" value="{{ $role->name }}">
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash">Eliminar</i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
