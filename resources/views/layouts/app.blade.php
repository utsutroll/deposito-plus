<!doctype html>
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
    <!-- sweealert2 -->
    <link rel="stylesheet" href="/dist/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- toastr -->
    <link rel="stylesheet" href="/dist/toastr/toastr.min.css">
    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">
    <header>
        @if(!\Request::is('login') && !\Request::is('register'))
            @include('partial.nav-bar')
        @endif
    </header>     
    <div class="flex-shrink-0 py-4">
        @yield('content')
    </div>
    
       
    <script src="{{ asset('/js/bootstrap5/bootstrap.min.js') }}"></script>
    <!-- jQuery -->
    <script src="/dist/jquery/jquery.min.js"></script>
    @stack('script')
</body>
</html>
