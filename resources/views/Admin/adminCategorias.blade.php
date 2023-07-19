@extends('adminlte::page')
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
        <i class="fas fa-plus"></i> Nueva Categoria
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Nombre">
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="container">
        <table class="table table-striped" id="categoryTable">
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
                                data-target="#myModal{{ $categoria->id }}"><i class="fas fa-edit"></i> Editar</a>

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
                                            <p>Nombre Actual: <strong>{{ $categoria->name }}</strong></p>
                                            <form action="{{ 'categorias/nuevoNombre' }}" method="GET"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="hidden" name="id" class="form-control"
                                                        value="{{ $categoria->id }}" readonly>
                                                    <label for="nombre">Nuevo Nombre:</label>
                                                    <input type="text" name="nameNew" class="form-control"
                                                        placeholder="Nombre">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cerrar</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ 'categorias/eliminar' }}" method="GET" enctype="multipart/form-data"
                                style="display: inline-block;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $categoria->id }}">
                                <input type="hidden" name="name" value="{{ $categoria->name }}">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src={{ asset('js\pagination.js') }}></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@stop
