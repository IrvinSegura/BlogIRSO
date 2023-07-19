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
        <i class="fas fa-plus">Nuevo Usuario</i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ 'usuarios' }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            Nombre: <input type="text" name="name" class="form-control" id="name"><br>
                            Email: <input type="text" name="email" class="form-control" id="email"><br>
                            Contraseña: <input type="password" name="password" class="form-control" id="password"><br>
                            Rol: <select name="rol" class="form-control" id="rol">
                                @foreach ($role as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                class="fas fa-times">Cerrar</i></button>

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
                <table class="table table-bordered mt-5" id="categoryTable">
                    <thead class="table-head">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Creacion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="table-body">
                        @foreach ($users as $user)
                            @if ($user->deleted_at == null)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($role as $rol)
                                            @if ($user->rol == $rol->id)
                                                {{ $rol->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <!-- Botón para abrir el modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModal{{ $user->id }}">
                                            <i class="fas fa-edit">Editar</i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel{{ $user->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{ $user->id }}">
                                                            Editar Usuario</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ 'usuarios/editar' }}" method="GET"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <input type="hidden" name="id" class="form-control"
                                                                    id="id" value="{{ $user->id }}">
                                                                Nombre: <input type="text" name="name"
                                                                    class="form-control" id="name"
                                                                    value="{{ $user->name }}"><br>
                                                                Email: <input type="text" name="email"
                                                                    class="form-control" id="email"
                                                                    value="{{ $user->email }}"><br>
                                                                Nuevo Rol: <select name="rol" class="form-control"
                                                                    id="rol">
                                                                    @foreach ($role as $rol)
                                                                        <option value="{{ $rol->id }}">
                                                                            {{ $rol->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <center><input type="submit" class="btn btn-primary"
                                                                    value="Enviar">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Cerrar</button>
                                                            </center>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <form action="{{ 'usuarios/eliminar' }}" method="GET"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" class="form-control"
                                                    id="idUserDelete" value="{{ $user->id }}">
                                                <input type="hidden" name="name" class="form-control"
                                                    id="nameUserDelete" value="{{ $user->name }}">
                                                <input type="hidden" name="email" class="form-control"
                                                    id="emailUserDelete" value="{{ $user->email }}">
                                                <input type="hidden" name="rol" class="form-control"
                                                    id="rolUserDelete" value="{{ $user->rol }}">
                                                <input type="hidden" name="password" class="form-control"
                                                    id="passwordUserDelete" value="{{ $user->password }}">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src={{ asset('js\pagination.js') }}></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@stop
