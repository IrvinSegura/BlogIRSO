<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/loginJEIRSA.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="card-header">{{ __('Login') }}</div>
            <div class="signin-signup">
                <center><h1> Inicio de Sesión </h1></center><br><br>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <label for="email" class="col-form-label">{{ __('Correo:') }}</label><br>
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <label for="password" class="col-form-label">{{ __('Contraseña') }}</label><br>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-primary">
                            {{ __('Iniciar Sesión') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">

                <img src="{{ asset('storage\loginJEIRSA.png') }}" class="image" alt="" />
            </div>
        </div>

</body>
