@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
        </div>
        <div class="card">
            <table class="table table-bordered mt-5">
                <thead class="table-head">
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>rol</th>
                        <th>creacion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="table-body">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->rol}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                            <a href="" class="btn btn-primary">Editar</a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card">
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
                            data: [{{$cantidad_Admin}}, {{$cantidad_Editor}}, {{$cantidad_User}}],
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
    </div>
</div>
@endsection
