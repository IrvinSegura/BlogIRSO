@extends('adminlte::page');
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@section('title', 'Publicaciones')

@section('content_header')
    <h1>Publicaciones</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
@stop

@section('content')
    @foreach ($publication as $publicacion)
        <div class="card" style="border: 2px solid orangered;">
            <div class="card-header">
                <h1 class="card-title">{{ $publicacion->id }}</h1>
                <h1 class="card-title">{{ $publicacion->title }} </h1>
                Creado por
                @foreach ($user as $usuario)
                    @if ($usuario->id == $publicacion->user_id)
                        {{ $usuario->name }}
                    @endif
                @endforeach
                Hace: {{ $tiempo = \Carbon\Carbon::parse($publicacion->created_at)->locale('es')->diffForHumans() }}
                <div class="globo">
                    <p class="card-text">
                        @foreach ($category as $categoria)
                            @if ($categoria->id == $publicacion->category_id)
                                {{ $categoria->name }}
                            @endif
                        @endforeach
                    </p>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{ $publicacion->content }}</p>
                Imagen de la publicacion
                <img src="{{ asset('storage\img\Hasbulla-Wallpaper-4.img') }}" alt="imagen de la publicacion" widht="100px"
                    height="100px">
            </div>
            <div class="post">
                <div class="post-content">
                    <p>Contenido del post</p>
                </div>
                <div class="post-actions">
                    <form action="{{ 'comentario' }}" method="get" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="publication_id" value="{{ $publicacion->id }}"><br>
                        Comentar: <input type="text" name="comment">
                        <button type="submit" class="btn btn-primary">Comentar</button>
                    </form>
                </div>
                <br><br>
                <form>
                    <input type="button" onclick="mostrar()" class="add-to-cart" value="Ver Comentarios" />
                </form>
                <div id="alerta">
                    @foreach ($comment as $comentario)
                        @if ($comentario->publication_id == $publicacion->id)
                            <div class="post-comment">
                                <div class="post-comment-header">
                                    <i class="fas fa-user-circle"></i>
                                    <div class="post-comment-header-text">
                                        <p class="post-comment-username">
                                            @foreach ($user as $usuario)
                                                @if ($usuario->id == $comentario->user_id)
                                                    {{ $usuario->name }}
                                                @endif
                                            @endforeach
                                        </p>
                                        <p class="post-comment-time">
                                            {{ $tiempo = \Carbon\Carbon::parse($comentario->created_at)->locale('es')->diffForHumans(); }}
                                        </p>
                                    </div>
                                </div>
                                <div class="post-comment-body">
                                    <p class="post-comment-text">
                                        {{ $comentario->comment }}
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <script src={{ asset('js\publication.js') }}></script>
                </div>
            </div>
        </div>
        <br><br>
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
