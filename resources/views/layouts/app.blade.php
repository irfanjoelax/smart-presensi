<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    @yield('style')
</head>

<body class="bg-light">
    <div id="app">
        <nav class="navbar bg-light shadow py-3">
            <div class="container-fluid justify-content-between">
                <a class="text-decoration-none text-dark d-flex gap-2 align-items-center"
                    href="{{ url('/mahasiswa/dashboard', []) }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" width="30" class="">
                    <span class="fs-5 fw-bold">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <a class="btn btn-sm btn-outline-secondary rounded" href="{{ url('/mahasiswa/profile', []) }}">
                    <i class="fas fa-user-cog"></i>
                </a>
            </div>
        </nav>

        <main class="container py-4">
            @yield('content')
        </main>
    </div>

    {{-- script --}}
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script>
    @yield('script')
</body>

</html>
