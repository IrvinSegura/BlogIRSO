@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

    <head>
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='{{ asset('css/calendar.css') }}' rel='stylesheet' type='text/css'>
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <!-- Botón para abrir el modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                    Abrir modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Crear Publicación</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ 'hola/formulario' }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-3">
                                        <label for="title" class="form-label">Título</label><input type="text" class="form-control" id="title" name="title" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoría</label>
                                        <select class="form-select" aria-label="Default select example" id="category_id"
                                            name="category_id" required>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                    </div>

                                    <div class="mb-3">
                                        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
                                        <label>Imagen:</label>
                                        <input type="file" class="form-control" name="src_img" id="src_img"
                                            maxlength="256" placeholder="Imagen">
                                        <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                                        <img src="" width="150px" height="120px" id="imagenmuestra">
                                        <script src={{ asset('js/modal.js') }}></script>
                                        <script>
                                            //al enviar el formulario,descargar automaticamente la imagen en mi pc
                                            $(document).ready(function() {
                                                $('#src_img').change(function() {
                                                    var file = $('#src_img')[0].files[0];
                                                    var reader = new FileReader();
                                                    reader.onloadend = function() {
                                                        $('#imagenmuestra').attr('src', reader.result);
                                                    }
                                                    reader.readAsDataURL(file);
                                                });
                                            });
                                        </script>
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Enviar">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    @stop

    @section('css')
        <link rel="stylesheet" href="/css/home.css">
    @stop

    @section('js')
        <script>
            console.log('Hola!');
        </script>
    @stop
