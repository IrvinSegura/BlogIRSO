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
                <div class="card-estadisticas">
                    <div><canvas id="myChart"></canvas></div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById('myChart');
                        new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Administrador', 'Usuario', 'Editor'],
                                datasets: [{
                                    label: 'Cantidad de usuarios',
                                    data: [{{ $cantidad_Admin }}, {{ $cantidad_Editor }}, {{ $cantidad_User }}],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                        });
                    </script>
                </div>
                <div class="card-estadisticas1">
                    <div><canvas id="myChart1"></canvas></div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx2 = document.getElementById('myChart1'); /* Cambio de id para evitar duplicidad */
                        new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: ['Administrador', 'Usuario', 'Editor'],
                                datasets: [{
                                    label: 'Cantidad de usuarios',
                                    data: [{{ $cantidad_Admin }}, {{ $cantidad_Editor }}, {{ $cantidad_User }}],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)' /* Eliminación de punto extra */
                                    ],
                                    borderWidth: 1
                                }]
                            },
                        });
                    </script>
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
