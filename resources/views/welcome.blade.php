<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="caja.png" type="image/x-icon">
        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Bootstrap 5 -->
        <link href="/css/bootstrap5/bootstrap.min.css" rel="stylesheet">
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="/dist/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: rgb(7, 7, 7);
                color: #ffffff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
            }

            .links > a {
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
    </head>
    <body>
        <div class="cover-container d-flex w-50 h-50 p-3 mx-auto flex-column">
            <h3>
                <strong>
                    <i class="bi bi-box-seam"></i> {{ config('app.name', 'Laravel') }}
                </strong>
            </h3>
            
            <div class="content">
                
                <div class="m-b-md mt-5">
                    <i class="bi bi-lock-fill text-success"></i> <span class="pt-2" style="font-size: 10px;">ACCESO SEGURO</span> <br>
                    <span class="title">Iniciar Sesión</span> 
                </div>

                <div class="links d-flex justify-content-center">
                    <div class="card w-75 rounded shadow-sm bg-dark text-white">
                        <div class="card-body text-start">
                            <form method="post" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="mb-2">Correo</label>
                                    <input type="email" name="email" id="email" class="form-control border border-0 text-white @error('email') is-invalid @enderror" style="background: #181818;" value="{{ old('email') }}" autocomplete="email" autofocus  placeholder="Correo...">
                                    <div class="invalid-feedback">
                                        Ingrese una Dirección de Correo Valida.
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password" class="mb-2"> Contraseña</label>
                                    <input type="password" min="1" maxlength="12" class="form-control border border-0 text-white" style="background: #181818;" name="password" id="" {{ old('password') }} placeholder="Contraseña...">
                                    <div class="invalid-feedback">
                                        Ingrese una Contraseña.
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-6 d-flex justify-content-start">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Recuerdame') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="form-group row mt-2 mb-0">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-warning" style="font-weight: 500;width: 100%;">
                                            </i> {{ __('ACCEDER') }}</strong>
                                        </button>
                                    </div>    
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Olvidé mi Contraseña') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ScrollReveal-->
        <script src="https://unpkg.com/scrollreveal"></script>
        <script>
            ScrollReveal().reveal('.cover-container', { delay: 250 });
        </script>
    </body>
</html>
