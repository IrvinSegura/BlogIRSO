@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/perfilAdmin.css') }}">
    <!-- Based on: https://dribbble.com/shots/4883028-Profile-Stats-->
    <div class="layout">
        <div class="profile">
            <div class="profile__picture"><img src="http://i.pravatar.cc/250?img=58" alt="ananddavis" /></div>
            <div class="profile__header">
                <div class="profile__account">
                    <strong> {{ $usuario = DB::table('users')->where('id', Auth::user()->id)->value('name') }}</strong>
                    <h4 class="profile__username"></h4>
                </div>
                <div class="profile__edit"><a class="profile__button" href="#">Edit Profile</a></div>
            </div>
            <div class="profile__stats">
                <div class="profile__stat">
                    <div class="profile__icon profile__icon--blue"><i class="fas fa-pencil-alt"></i></div>
                    <div class="profile__value">123
                        <div class="profile__key">Post hechos</div>
                    </div>
                </div>

                <div class="profile__stat">
                    <div class="profile__icon profile__icon--pink"><i class="fas fa-user-tag"></i></div>
                    <div class="profile__value">Admin
                        <div class="profile__key">Editor</div>
                    </div>
                </div>

                <div class="profile__stat">
                    <div class="profile__icon profile__icon--gold"><i class="fas fa-users"></i></div>
                    <div class="profile__value">5000
                        <div class="profile__key">Seguidores</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div>
        <link rel="stylesheet" href="{{ asset('css/formEdicion.css') }}">
        <h2>Mis post hechos</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="well well-sm">
                        {{-- @foreach($publicacionMostar as $publicacionHistorial)
                            @if ($publicacionHistorial->id == $publicacionHistorial->user_id)
                                <div>
                                    
                                </div>
                            @endif
                                
                            @endif
                        @endforeach    --}}
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
