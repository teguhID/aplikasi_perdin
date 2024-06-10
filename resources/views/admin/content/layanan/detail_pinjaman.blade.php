@extends('layouts.admin')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8">
            <h4>Detail Peminjaman Buku</h4>
        </div>
    </div>
    <hr>

    <div class="card border-primary bg-transparent">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <span>Judul Buku :</span>
                    </div>
                    <div class="row">
                        <h4><strong>{{ $data->book->name }}</strong></h4>
                    </div>
                    <hr>
                    <div class="row">
                        <span>Deskripsi :</span>
                    </div>
                    <div class="row">
                        <small>{{ $data->book->desc }}</small>
                    </div>

                </div>
                <div class="col-md-6 text-end">
                    <div class="row">
                        <small>No Invoice : {{ $data->id_invoice }}</small>
                    </div>
                    <div class="row">
                        <small>Tanggal Peminjaman : {{ $data->start_date }}</small>
                    </div>
                    <div class="row">
                        <small>Tenggat Waktu Peminjaman : {{ $data->end_date }}</small>
                    </div>
                    <div class="row mt-4">
                        <small>Tanggal Pengembalian : {{ $data->date_kembali ? $data->date_kembali : '-' }}</small>
                    </div>
                    <div class="row">
                        <small>Total Biaya Pinjaman : Rp. {{ number_format($data->total_harga, 0, ',', '.') }}</small>
                    </div>
                    <div class="row">
                        <small>Total Denda : Rp. {{ number_format($data->total_denda, 0, ',', '.') }}</small>
                    </div>
                    <div class="row mt-4">
                        <small>Status : {{ $data->status }}</small>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <strong>Peminjam</strong>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <span>nama : {{ $data->user->name }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <span>email : {{ $data->user->email }}</span>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')

<script>
    
</script>

@endpush
