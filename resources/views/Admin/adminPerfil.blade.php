@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')
    <link rel="stylesheet" href="{{ asset('css/perfilAdmin.css') }}">
    <div class="layout">
        <div class="profile">
            <div class="profile__picture"><img src="http://i.pravatar.cc/250?img=58" alt="ananddavis" /></div>
            <div class="profile__header">
                <div class="profile__account">
                    <strong> {{ $usuario = DB::table('users')->where('id', Auth::user()->id)->value('name') }}</strong>
                    <h4 class="profile__username"></h4>
                </div>
                <!-- Botón que abre el modal -->
                <div class="profile__edit">
                    <a class="profile__button" href="#" onclick="openModal()">Edit Profile</a>
                </div>

                <!-- Modal -->
                <div id="myModal" class="modal" >
                    <div class="modal-content">
                        <span class="close" onclick="closeModal()">&times;</span>
                        <h2>Edit Profile</h2>
                        <div class="container mt-4">
                            <h3>Editar Información</h3>

                            <form style="width:500px;">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control" id="inputPassword4"
                                            placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Actualizar Información</button>
                            </form>
                    </div>
                </div>
                <script>
                    // Función para abrir el modal
                    function openModal() {
                        document.getElementById("myModal").style.display = "block";
                    }

                    // Función para cerrar el modal
                    function closeModal() {
                        document.getElementById("myModal").style.display = "none";
                    }
                </script>
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
                        {{-- @foreach ($publicacionMostar as $publicacionHistorial)
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
