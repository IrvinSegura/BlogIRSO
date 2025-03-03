@extends('adminlte::page')

@section('title', 'Inicio')

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
                <i class="fas fa-plus"></i> Crear Publicación
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
                            <form action="{{ 'publicacion' }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Título</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <select class="form-select" aria-label="Default select example" id="category_id"
                                        name="category_id" required>
                                        <?php $categories = DB::table('category')->get(); ?>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Imagen:</label>
                                    <input type="file" class="form-control" name="src_img" id="src_img" maxlength="256"
                                        placeholder="Imagen">
                                    <input type="hidden" class="form-control" name="imagenactual" id="imagenactual">
                                    <img src="" width="150px" height="120px" id="imagenmuestra">
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
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card_user.css') }}">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#src_img').change(function() {
                var file = $('#src_img')[0].files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    $('#imagenmuestra').attr('src', reader.result);
                };
                reader.readAsDataURL(file);
            });
        });
    </script>
@stop
