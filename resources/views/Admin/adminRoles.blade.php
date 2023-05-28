@extends('adminlte::page');
<link rel="stylesheet" href="{{ asset('css/publication.css') }}">
@section('title', 'Publicaciones')

@section('content_header')
    <h1>Roles</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">Volver</a>
@stop

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
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
