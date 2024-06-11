@extends('layouts.app')

@section('content')

<div style="margin-top: 55px;">&nbsp;</div>

{{-- slider image --}}
<div id="slider" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        
        @foreach ($data['banner'] as $key => $value)
            <div class="carousel-item active">
                <img src="{{ asset('') }}img/{{ $value->image_path }}" class="d-block w-100" alt="...">
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">

    {{-- Layanan Kami --}}
    <section id="layanan">&nbsp;</section>
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <div class="row my-3">
                <div class="col-md-12">
                    <p class="title-text">Layanan Kami</p>
                </div>
            </div>
            <div class="row">
                
                @foreach ($data['layanan'] as $key => $value)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 py-4">
                                        <img src="{{ asset('') }}img/{{ $value->image_path }}" alt="" width="150">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="title-text-card">{{ $value->name }}</p>
                                        <p>{{ $value->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    </div>
    <section class="mb-4"></section>

    {{-- profile --}}
    <section id="why-choose-us">&nbsp;</section>
    <div class="row mt-5">
        <div class="col-md-12">
            
            @foreach ($data['profile'] as $key => $value)
                <div class="row my-3">
                    <div class="col-md-12 text-center">
                        <p class="title-text">{{ $value->judul }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>{{ $value->desc }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <section class="mb-4"></section>

    {{-- why choose us 1 --}}
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="row my-3">
                <div class="col-md-12 text-center">
                    <p class="title-text">Kenapa Harus Pilih Kami ?</p>
                </div>
            </div>
            <div class="row">
                @foreach ($data['choose_us'] as $key => $value)
                    <div class="col-md-4 text-center">
                        <div class="card bg-transparent">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 py-4">
                                        <img src="{{ asset('') }}img/{{ $value->image_path }}" alt="" width="150">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="title-text-card">{{ $value->name }}</p>
                                        <p>{{ $value->desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="mb-4"></section>
    
    {{-- portofolio --}}
    <section id="portofolio">&nbsp;</section>
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="row my-3">
                <div class="col-md-12 text-center">
                    <p class="title-text">Portofolio Rekan Teknik Service</p>
                </div>
            </div>
            <div class="row">

                @foreach ($data['portofolio'] as $key => $value)
                    <div class="col-md-3 mt-4 text-center">
                        <img src="{{ asset('') }}img/{{ $value->image_path }}" alt="" class="rounded" width="260" height="260">
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <section class="mb-4"></section>

    {{-- footer --}}
    <section id="footer">&nbsp;</section>
    <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
        <div class="col-md-4 mb-3">
            @foreach ($data['toko'] as $key => $value)
                @if ($value->name == 'Icon')
                    <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                        <img src="{{ asset('') }}img/{{ $value->desc }}" alt="" height="60">
                    </a>
                @endif
                @if ($value->name == 'Nama Toko')
                    <p class="text-muted">Copyright &copy; 2024 {{ $value->desc  }}</p>
                @endif
            @endforeach
        </div>
    
        <div class="col-md-2 mb-3">
    
        </div>
    
        <div class="col-md-3 mb-3">
        <h5 class="color-primary">Layanan Kami</h5>
        <ul class="nav flex-column">
            @foreach ($data['layanan'] as $key => $value)
                <li class="nav-item mb-2">
                    <i class="fa-solid fa-check color-primary"></i>
                    {{ $value->name }}
                </li>
            @endforeach
        </ul>
        </div>
    
        <div class="col-md-3 mb-3">
        <h5 class="color-primary">Kontak Kami</h5>
        <ul class="nav flex-column">
            @foreach ($data['contact'] as $key => $value)
                @if ($value->desc != '' && $value->name != 'maps')
                    <li class="nav-item mb-2">
                        <div class="nav-link p-0 text-muted">
                            <i class="{{ $value->icon }}"></i>
                            {{ $value->desc }}
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        </div>
    </footer>

</div>

@endsection

@push('scripts')

<script>
    
</script>

@endpush
