@extends('adminlte::page')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('title', 'Inicio')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
    @if (Session::has('success'))
        <x-success-popup />
    @endif
    @if (Session::has('failed'))
        <x-failed-popup />
    @endif
    <br><br>
    <!-- Botón para abrir el modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        <i class="fas fa-add">Nueva Categoria</i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ 'categorias' }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <center>
        <table class="table table-striped" style="max-width: 750px;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->name }}</td>
                        <td>
                            <a href="" class="btn btn-primary" data-toggle="modal"
                                data-target="#myModal{{ $categoria->id }}"><i class="fas fa-edit">Editar</i></a>

                            <div class="modal fade" id="myModal{{ $categoria->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel{{ $categoria->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel{{ $categoria->id }}">Editar
                                                Categoria</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Nombre Actual:
                                            <label for="nombre" class="form-label">{{ $categoria->name }}</label>
                                            <form action="{{ 'categorias/nuevoNombre' }}" method="GET"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <input type="hidden" name="id" class="form-control" id="id"
                                                        placeholder="Id" value="{{ $categoria->id }}" readonly>
                                                    <label for="nombre" class="form-label">Nuevo Nombre:</label>
                                                    <input type="text" name="nameNew" class="form-control" id="nameNew"
                                                        placeholder="Nombre">
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
                                <form action="{{ 'categorias/eliminar' }}" method="GET" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" class="form-control" id="id"
                                        placeholder="Id" value="{{ $categoria->id }}" readonly>
                                    <input type="hidden" name="name" class="form-control" id="name"
                                        placeholder="Nombre" value="{{ $categoria->name }}" readonly>
                                    <button type="submit" class="btn btn-danger"><i
                                            class="fas fa-trash">Eliminar</i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </center>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
