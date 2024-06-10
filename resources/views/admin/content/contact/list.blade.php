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
                            <h5>Kontak Toko Anda</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.content.contact.edit_view') }}" class="btn btn-outline-primary w-200px">
                                <small>Ubah Kontak</small>
                            </a>
                        </div>
                    </div>  
                    <hr>
                    <div class="row">
                        <div class="col-md-12">

                            @foreach ($data as $key => $value)
                                <div class="row mt-2">
                                    <div class="col-md-2">
                                        <i class="{{ $value->icon }}"></i>
                                        {{ $value->name }}
                                    </div>
                                    <div class="col-md-7">
                                        {{ $value->desc }}
                                    </div>
                                </div>
                            @endforeach

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
