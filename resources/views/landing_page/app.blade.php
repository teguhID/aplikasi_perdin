@php
    use App\Models\toko;
    use App\Models\contact;
    use App\Models\profile;

    $profile = profile::get()->first();
    $toko = toko::all();
    $contact = contact::all();

    $nama_toko = '';

    foreach ($toko as $key => $value) {
        if ($value->name == 'Nama Toko'){
            $nama_toko = $value->desc;
        };
    };
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $nama_toko }} - Jasa Servis di Kota Bandung</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $profile->desc }}">
    <meta name="keywords" content="jasa servis, jasa service, servis elektronik, service elektronik, servis komputer, service komputer, servis rumah, service rumah, servis AC, service AC, servis mobil, service mobil, Bandung">
    <meta name="author" content="{{ $nama_toko }}">

     <!-- Open Graph Meta Tags -->
     <meta property="og:title" content="{{ $nama_toko }} - Jasa Servis di Kota Bandung">
     <meta property="og:description" content="{{ $profile->desc }}">
     <meta property="og:image" content="path/to/image.jpg">
     <meta property="og:image" content="{{ asset('') }}public/img/apple-touch-icon.png">
     <meta property="og:url" content="https://jasaservisbandung.com/">
     <meta property="og:type" content="website">
     
     <!-- Twitter Card Meta Tags -->
     <meta name="twitter:card" content="summary_large_image">
     <meta name="twitter:title" content="{{ $nama_toko }} - Jasa Servis di Kota Bandung">
     <meta name="twitter:description" content="{{ $nama_toko }} menyediakan jasa servis terpercaya di kota Bandung. Kami melayani berbagai kebutuhan servis Anda dengan profesionalisme dan keahlian.">
     <meta name="twitter:image" content="{{ asset('') }}public/img/apple-touch-icon.png">
 
     <!-- Additional Meta Tags -->
     <meta name="theme-color" content="#4CAF50">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet"> --}}

    <link href="{{ asset('') }}public/img/favicon.png" rel="icon">
    <link href="{{ asset('') }}public/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,500;1,500&family=Noto+Sans:ital,wght@0,700;1,700&display=swap" rel="stylesheet">

    <!-- icon fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('') }}public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('') }}public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('') }}public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{ asset('') }}public/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('') }}public/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{ asset('') }}public/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{ asset('') }}public/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('') }}public/css/style.css" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
            <div class="container">
                @foreach ($toko as $key => $value)
                    @if ($value->name == 'Icon')
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ asset('') }}public/img/{{ $value->desc }}" alt="" height="60">
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
                            <a id="navbarDropdown" class="nav-link {{ Route::is('home') ? 'link-active' : '' }}" href="/" role="button">
                                Home
                            </a>
                        </li>
                        @if (Route::is('home'))
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
                        @endif
                        <li class="nav-item mx-2">
                            <a id="navbarDropdown" class="nav-link {{ Route::is('blog') || Route::is('blog.detail') ? 'link-active' : '' }}" href="{{ route('blog') }}" role="button">
                                Blog
                            </a>
                        </li>
                        @guest
                            <li class="nav-item mx-2">
                                <a id="navbarDropdown" class="nav-link {{ Route::is('login') ? 'link-active' : '' }}" href="{{ route('login') }}" role="button">
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

            @if (Route::is('home'))
                <div class="bottom-nav p-2">
                    <div class="row justify-content-center">
                        @foreach ($contact as $key => $value)
                            @if ($value->name == 'phone')
                            <div class="col text-center py-3" style="cursor: pointer;" onclick="sendphone('{{$value->desc}}')">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Telephone</span>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($contact as $key => $value)
                            @if ($value->name == 'whatsapp')
                                <div class="col text-center py-3" style="cursor: pointer;" onclick="sendwa('{{$value->desc}}')">
                                    <i class="fa-brands fa-whatsapp"></i>
                                    <span>Whatsapp</span>
                                </div>
                            @endif
                        @endforeach
                        @foreach ($contact as $key => $value)
                        @if ($value->name == 'maps')
                            <div class="col text-center py-3" style="cursor: pointer;" onclick="sendmaps('{{$value->desc}}')">
                                <i class="fa-solid fa-map-location-dot"></i>
                                <span>Maps</span>
                            </div>
                        @endif
                    @endforeach
                    </div>
                </div>
            @endif

        </main>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('') }}public/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('') }}public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('') }}public/vendor/chart.js/chart.umd.js"></script>
    <script src="{{ asset('') }}public/vendor/echarts/echarts.min.js"></script>
    <script src="{{ asset('') }}public/vendor/quill/quill.js"></script>
    <script src="{{ asset('') }}public/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ asset('') }}public/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ asset('') }}public/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('') }}public/js/main.js"></script>
    <script src="{{ asset('') }}public/js/jquery-3.7.1.min.js"></script>

    <script>

        $(document).ready(function () {
            $(".nav-link").click(function(event) {
                // event.preventDefault();
                $(".nav-link").removeClass("link-active");
                $(this).addClass("link-active");
            });
        });

        function sendwa(number) {
            var message = "Selamat pagi/siang/malam! Saya tertarik dengan layanan jasa perbaikan yang anda tawarkan. Bisakah saya mendapatkan informasi lebih lanjut ?";
            var url = "https://wa.me/" + number + "/?text=" + encodeURIComponent(message);
            window.open(url, "_blank");
        }

        function sendphone(number) {
            var url = "tel:" + number;
            window.open(url, "_blank");
        }

        function sendmaps(url){
            window.open(url, "_blank");
        }
    </script>

    @stack('scripts')

</body>
</html>
