@extends('layouts.app')

@section('content')
<div class="container" id="content">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            No Invoice : {{ $data->id_invoice }}
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('print_invoice', ['id_invoice' => $data->id_invoice]) }}" target="blank">Print Invoice</a>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-md-2">
                            Nama
                        </div>
                        <div class="col-md-8">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Email
                        </div>
                        <div class="col-md-8">
                            {{ auth()->user()->email }}
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive" >
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="">
                                            <td scope="row">1</td>
                                            <td>
                                                {{ $data->domain }} <br>
                                                <small class="text-black-50">{{ $data->duration }} Bulan</small>
                                            </td>
                                            <td> Rp {{ number_format($data->total_harga, 0, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-end">
                            <b>Total</b> : Rp {{ number_format($data->total_harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-md-12 text-center">
                            Silahkan bayar di no rekeninm berikut ini <br/> 663721667321
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
