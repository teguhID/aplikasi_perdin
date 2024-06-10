@php
    use App\Models\toko;
    $toko = toko::all();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Master CMS</title>

    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Favicons -->
    <link href="{{ asset('') }}img/favicon.png" rel="icon">
    <link href="{{ asset('') }}img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,500;1,500&family=Noto+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <!-- icon fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('') }}vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('') }}vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('') }}vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('') }}vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                @foreach ($toko as $key => $value)
                    @if ($value->name == 'Icon')
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('') }}img/{{ $value->desc }}" alt="" height="60">
                        </a>
                    @endif
                @endforeach
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link" href="/" role="button">
                                Home
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link" href="#layanan" role="button">
                                Layanan Kami
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link" href="#why-choose-us" role="button">
                                Kenapa Memilih Kami
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link" href="#portofolio" role="button">
                                Portofolio
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link" href="#footer" role="button">
                                Kontak
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link" href="{{ route('blog') }}" role="button">
                                Blog
                            </a>
                        </li>
                        @guest
                            <li class="nav-item mx-2">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('login') }}" role="button">
                                    Login
                                </a>
                            </li>
                        @else
                            <li class="nav-item mx-2">
                                <a id="navbarDropdown" class="nav-link" href="{{ route('admin.dashboard') }}" role="button">
                                    Dashboard
                                </a>
                            </li>    
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('') }}vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('') }}vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('') }}vendor/quill/quill.js"></script>
    <script src="{{ asset('') }}vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('') }}vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('') }}vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('') }}js/main.js"></script>
    <script src="{{ asset('') }}js/jquery-3.7.1.min.js"></script>

    @stack('scripts')

</body>
</html>
