@extends('adminlte::page');
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@section('title', 'Publicaciones')

@section('content_header')
    <h1>Publicaciones</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
@stop

@section('content')
    @foreach ($publicationes as $publicacion)
        <center>
            <div class="container">
                <article class="item-pane">
                    <div class="item-preview">
                        <div class="book"></div>
                    </div>
                    <div class="item-details">
                        <div style="background-color: orange;">
                            <h1>{{ $publicacion->title }}</h1>
                        </div>
                        <div style="background-color: yellow;"><span class="subtitle">
                                <div class="globo">
                                    <p class="card-text">
                                        @foreach ($category as $categoria)
                                            @if ($categoria->id == $publicacion->category_id)
                                                {{ $categoria->name }}
                                            @endif
                                        @endforeach
                                    </p>
                                </div>
                            </span></div>
                        <div class="pane__section" style="display: flex; align-items: center;">
                            <div class="imagen" style="margin-right: 
                            15px; margin-left: 0;">
                                <img src="{{ $publicacion->src_img_url }}" alt="" width="400px" />
                                {{ $publicacion->src_img_url }}
                            </div>
                            <div class="texto" style="text-align: justify;">
                                <p>
                                    {{ $publicacion->content }}
                                </p>
                            </div>
                        </div>


                        <div class="pane__section">
                            <dl>
                                <dt>Autor: </dt>
                                <dd>
                                    @foreach ($user as $usuario)
                                        @if ($usuario->id == $publicacion->user_id)
                                            {{ $usuario->name }}
                                        @endif
                                    @endforeach
                                </dd>
                                <dt>Publicado hace:</dt>
                                <dd>{{ $tiempo = \Carbon\Carbon::parse($publicacion->created_at)->locale('es')->diffForHumans() }}
                                </dd>
                                <dt>Edition</dt>
                                <dd>BLOG JEIRSA</dd>
                                <dt>Id Publicación: </dt>
                                <dd>{{ $publicacion->id }}</dd>
                            </dl>
                        </div>
                    </div>
                </article>
            </div>
            <center>
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
