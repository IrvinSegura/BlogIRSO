@extends('adminlte::page')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">

@section('title', 'Dashboard')

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
    <br><br>
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
                <table class="table table-bordered mt-5" id="categoryTable">
                    <thead class="table-head">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Creacion</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="table-body">
                        @foreach ($users as $user)
                            @if ($user->deleted_at == true)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @foreach ($role as $rol)
                                            @if ($user->rol == $rol->id)
                                                {{ $rol->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <form action="{{ 'restaurar' }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-trash"></i>
                                                Restaurar
                                            </button>
                                        </form>
                                    </td>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card">
                <table class="table table-bordered mt-5" id="categoryTable">
                    <thead class="table-head">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="table-body">
                        @foreach ($category as $categoria)
                            @if ($categoria->deleted_at == true)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->name }}</td>
                                    <td>
                                        <form action="{{ 'restaurar/categoria' }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $categoria->id }}">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-trash"></i>
                                                Restaurar
                                            </button>
                                        </form>
                                    </td>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div> 
            <div class="card">
                <table class="table table-bordered mt-5" id="categoryTable">
                    <thead class="table-head">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="table-body">
                        @foreach ($role as $rol)
                            @if ($rol->deleted_at == true)
                                <tr>
                                    <td>{{ $rol->id }}</td>
                                    <td>{{ $rol->name }}</td>
                                    <td>
                                        <form action="{{ 'restaurar/rol' }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $rol->id }}">
                                            <button type="submit" class="btn btn-success"><i class="fas fa-trash"></i>
                                                Restaurar
                                            </button>
                                        </form>
                                    </td>
                            @endif
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@stop

@section('js')
    <script src={{ asset('js\pagination.js') }}></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
@stop
