@php
    use App\Models\toko;
    use App\Models\contact;
    use App\Models\profile;

    $profile = profile::get()->first();
    $toko = toko::all();
    $contact = contact::all();
@endphp

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $profile->desc }}">
    <meta name="keywords" content="jasa servis, jasa service, servis elektronik, service elektronik, servis komputer, service komputer, servis rumah, service rumah, servis AC, service AC, servis mobil, service mobil, Bandung">
    <meta name="author" content="Globe Servis">

     <!-- Open Graph Meta Tags -->
     <meta property="og:title" content="Globe Servis - Jasa Servis di Kota Bandung">
     <meta property="og:description" content="{{ $profile->desc }}">
     <meta property="og:image" content="path/to/image.jpg">
     <meta property="og:image" content="{{ asset('') }}img/apple-touch-icon.png">
     <meta property="og:url" content="https://jasaservisbandung.com/">
     <meta property="og:type" content="website">
     
     <!-- Twitter Card Meta Tags -->
     <meta name="twitter:card" content="summary_large_image">
     <meta name="twitter:title" content="Globe Servis - Jasa Servis di Kota Bandung">
     <meta name="twitter:description" content="Globe Servis menyediakan jasa servis terpercaya di kota Bandung. Kami melayani berbagai kebutuhan servis Anda dengan profesionalisme dan keahlian.">
     <meta name="twitter:image" content="{{ asset('') }}img/apple-touch-icon.png">
 
     <!-- Additional Meta Tags -->
     <meta name="theme-color" content="#4CAF50">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @foreach ($toko as $key => $value)
        @if ($value->name == 'Nama Toko')
            <title>{{ $value->desc }}</title>
        @endif
    @endforeach

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
    <link href="{{ asset('') }}css/style.css" rel="stylesheet">

    @stack('styles')

</head>
<body>
    
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        @php
            $currentRoute = Route::currentRouteName();
        @endphp

        <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
            @foreach ($toko as $key => $value)
                @if ($value->name == 'Icon')
                    <span class="d-none d-lg-block">
                        <img src="{{ asset('') }}img/{{ $value->desc }}" alt="" height="80">
                    </span>
                @endif
            @endforeach
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>{{ Auth::user()->name }}</h6>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                    </a>
                    <form id="logout_form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ 
                    
                    $currentRoute == 'admin.toko' ||
                    $currentRoute == 'admin.toko.edit_view'
                    
                    ? '' : 'collapsed' }}" href="{{ route('admin.toko') }}">
                <i class="fa-solid fa-shop"></i>
                <span>Toko</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ 
                    
                    ($currentRoute == 'admin.content.banner') ||
                    ($currentRoute == 'admin.content.layanan') || 
                    ($currentRoute == 'admin.content.layanan.add_view') ||
                    ($currentRoute == 'admin.content.layanan.edit_view') ||
                    ($currentRoute == 'admin.content.profile') ||
                    ($currentRoute == 'admin.content.profile.edit_view') ||
                    ($currentRoute == 'admin.content.choose_us') || 
                    ($currentRoute == 'admin.content.choose_us.add_view') ||
                    ($currentRoute == 'admin.content.choose_us.edit_view') ||
                    ($currentRoute == 'admin.content.portofolio') ||
                    ($currentRoute == 'admin.content.contact') ||
                    ($currentRoute == 'admin.content.contact.add_view') ||
                    ($currentRoute == 'admin.content.contact.edit_view')
                    
                    ? '' : 'collapsed' 
                    
                    }}" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">

                    <i class="fa-solid fa-sliders"></i>
                    <span>Konten</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav" class="nav-content {{ 
                    
                    ($currentRoute == 'admin.content.banner') ||
                    ($currentRoute == 'admin.content.layanan') ||
                    ($currentRoute == 'admin.content.layanan.add_view') ||
                    ($currentRoute == 'admin.content.layanan.edit_view') ||
                    ($currentRoute == 'admin.content.profile') ||
                    ($currentRoute == 'admin.content.choose_us') || 
                    ($currentRoute == 'admin.content.choose_us.add_view') ||
                    ($currentRoute == 'admin.content.choose_us.edit_view') ||
                    ($currentRoute == 'admin.content.profile.edit_view') ||
                    ($currentRoute == 'admin.content.portofolio') ||
                    ($currentRoute == 'admin.content.contact') ||
                    ($currentRoute == 'admin.content.contact.add_view') ||
                    ($currentRoute == 'admin.content.contact.edit_view')

                    ? '' : 'collapse' 
                    
                    }}" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.content.banner') }}" class="{{ 
                        
                        ($currentRoute == 'admin.content.banner')
                        
                        ? 'active' : '' 
                        
                        }}">
                        <i class="bi bi-circle"></i><span>Banner</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.layanan') }}" class="{{ 
                        
                        ($currentRoute == 'admin.content.layanan') ||
                        ($currentRoute == 'admin.content.layanan.add_view') ||
                        ($currentRoute == 'admin.content.layanan.edit_view')
                        
                        ? 'active' : '' 
                        
                        }}">
                        <i class="bi bi-circle"></i><span>Layanan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.profile') }}" class="{{ 
                        
                        ($currentRoute == 'admin.content.profile') ||
                        ($currentRoute == 'admin.content.profile.edit_view')
                        
                        ? 'active' : '' 
                        
                        }}">
                        <i class="bi bi-circle"></i><span>Profile</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.choose_us') }}" class="{{ 
                        
                        ($currentRoute == 'admin.content.choose_us') ||
                        ($currentRoute == 'admin.content.choose_us.add_view') ||
                        ($currentRoute == 'admin.content.choose_us.edit_view')
                        
                        ? 'active' : '' 
                        
                        }}">
                        <i class="bi bi-circle"></i><span>Choose Us</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.portofolio') }}" class="{{ 
                        
                        ($currentRoute == 'admin.content.portofolio')
                        
                        ? 'active' : '' 
                        
                        }}">
                        <i class="bi bi-circle"></i><span>Portofolio</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.content.contact') }}" class="{{ 
                        
                        ($currentRoute == 'admin.content.contact') ||
                        ($currentRoute == 'admin.content.contact.add_view') ||
                        ($currentRoute == 'admin.content.contact.edit_view')
                        
                        ? 'active' : '' 
                        
                        }}">
                        <i class="bi bi-circle"></i><span>Kontak</span>
                    </a>
                </li>
                
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ 
                    
                    $currentRoute == 'admin.blog' ||
                    $currentRoute == 'admin.blog.edit_view'
                    
                    ? '' : 'collapsed' }}" href="{{ route('admin.blog') }}">
                <i class="fa-solid fa-newspaper"></i>
                <span>Blog</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ 
                    
                    $currentRoute == 'admin.user' ||
                    $currentRoute == 'admin.user.edit_view'
                    
                    ? '' : 'collapsed' }}" href="{{ route('admin.user') }}">
                <i class="fa-solid fa-address-card"></i>
                <span>User Management</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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
