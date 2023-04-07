@extends('adminlte::page');
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@section('title', 'Publicaciones')

@section('content_header')
    <h1>Publicaciones</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
@stop

@section('content')
    @foreach ($publication as $publicacion)
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $publicacion->id }}</h3>
                <h3 class="card-title">{{ $publicacion->title }} </h3>
                Creado por 
                @foreach ($user as $usuario)
                    @if ($usuario->id == $publicacion->user_id)
                        {{ $usuario->name }}
                    @endif
                @endforeach
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
                <img src="{{ asset('storage\img\Hasbulla-Wallpaper-4.img') }}" alt="imagen de la publicacion" widht="100px" height="100px">
            </div>
            <div class="post">
                <div class="post-content">
                    <p>Contenido del post</p>
                </div>
                <div class="post-actions">
                    {{-- <div class="react-icon">
                        <img src="{{ asset('storage/img/reaction_like.img') }}" alt="reaccionar">
                        <span class="react-count">0</span>
                    </div>
                    <div class="react-icon">
                        <img src="{{ asset('storage/img/reaction_love.img') }}" alt="reaccionar">
                        <span class="react-count">0</span>
                    </div>
                    <div class="react-icon">
                        <img src="{{ asset('storage/img/reaction_haha.img') }}" alt="reaccionar">
                        <span class="react-count">0</span>
                    </div>
                    <div class="react-icon">
                        <img src="{{ asset('storage/img/reaction_wow.img') }}" alt="reaccionar">
                        <span class="react-count">0</span>
                    </div>
                    <div class="react-icon">
                        <img src="{{ asset('storage/img/reaction_sad.img') }}" alt="reaccionar">
                        <span class="react-count">0</span>
                    </div>
                    <div class="react-icon">
                        <img src="{{ asset('storage/img/reaction_angry.img') }}" alt="reaccionar">
                        <span class="react-count">0</span>
                    </div> --}}
                    <form action="{{ 'comentario' }}" method="get" enctype="multipart/form-data">                   
                        @csrf
                        Publicacion_id: <input type="text" name="publication_id" value="{{ $publicacion->id }}">
                        Comentar: <input type="text" name="comment">
                        <button type="submit"  class="btn btn-primary">Comentar</button>
                    </form>
                    <div>
                        @foreach ($comment as $comentario)
                            @if ($comentario->publication_id == $publicacion->id)
                                Comet<p>{{ $comentario->comment }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
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
