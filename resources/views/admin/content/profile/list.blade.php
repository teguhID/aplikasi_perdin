@extends('layouts.admin')

@push('styles')
@endpush

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <small><b>{{ session('success') }}</b></small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small><b>{{ session('error') }}</b></small>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body px-5 py-4">
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <h5>Profile Toko Anda</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.content.profile.edit_view', ['id_profile' => $data->id_profile]) }}" class="btn btn-outline-primary w-200px">
                                <small>Ubah Profile</small>
                            </a>
                        </div>
                    </div>  
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-2">
                                    Judul
                                </div>
                                <div class="col-md-9">
                                    {{ $data->judul }}
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-md-2">
                                    Deskripsi
                                </div>
                                <div class="col-md-9">
                                    {{ $data->desc }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
