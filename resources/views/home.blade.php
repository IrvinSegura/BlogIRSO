@extends('adminlte::page')

<link rel="stylesheet" href="{{ asset('css/card_user.css') }}">
@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop



    @section('css')
        <link rel="stylesheet" href="/css/home.css">
    @stop

    @section('js')
        <script>
            console.log('Hola!');
        </script>
    @stop
