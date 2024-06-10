@extends('layouts.admin')

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
        <div class="col-md-8">
            <h4>Histori Peminjaman Buku</h4>
        </div>
    </div>
    <hr>

    <form action="{{ route('admin.master.book.history.filter') }}" method="post">
        @csrf
        <div class="row mb-4">
            <input type="hidden" name="id_book" id="" value="{{ $data['id_book'] }}">
            <input type="hidden" name="stok" id="" value="{{ $data['stok'] }}">
            <div class="col-md-4 mt-1">
                <select name="status" id="status" class="form-control">
                    <option value="" {!! $data['status'] == '' ? 'selected' : '' !!}>Semua</option>
                    <option value="dipinjam" {!! $data['status'] == 'dipinjam' ? 'selected' : '' !!}>Dipinjam</option>
                    <option value="dikembalikan" {!! $data['status'] == 'dikembalikan' ? 'selected' : '' !!}>Dikembalikan</option>
                    <option value="telat" {!! $data['status'] == 'telat' ? 'selected' : '' !!}>Telat</option>
                </select>
            </div>
            <div class="col-md-1 mt-1">
                <button type="submit" class="btn btn-outline-success w-100">Filter</button>
            </div>
        </div>
    </form>

    @foreach ($data['riwayat_transaksi'] as $key => $value)
        <div class="card border-primary bg-transparent">
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <span>Judul Buku :</span>
                        </div>
                        <div class="row">
                            <h4><strong>{{ $value->book->name }}</strong></h4>
                        </div>
                    </div>
                    <div class="col-md-6 text-end">
                        <div class="row">
                            <small>No Invoice : {{ $value->id_invoice }}</small>
                        </div>
                        <div class="row">
                            <small>Tanggal Peminjaman : {{ $value->start_date }}</small>
                        </div>
                        <div class="row">
                            <small>Tenggat Waktu Peminjaman : {{ $value->end_date }}</small>
                        </div>
                        @if ($value->status == 'dikembalikan')
                            <div class="row mt-4">
                                <small>Tanggal Pengambalian : {{ $value->date_kembali }}</small>
                            </div>
                        @endif
                    </div>
                </div>

                <form action="{{ route('user.kembali_buku', ['id_invoice' => $value->id_invoice]) }}" method="post">
                    @csrf

                    <input type="hidden" name="id_book" id="" value="{{ $value->id_book }}">

                    <div class="row">
                        <div class="col-md-12 text-center">
                            @php
                                $now = \Carbon\Carbon::now();
                                $endDate = \Carbon\Carbon::createFromFormat('Y-m-d', $value->end_date);
                                $isPast = $endDate->isPast();
                                $differenceInDays = $now->diffInDays($endDate);
                            @endphp
                            <span>
                                Status : 
                                @if ($value->status == 'dikembalikan')
                                    <strong class="text-success">
                                        Buku Sudah dikembalikan
                                    </strong>
                                @else
                                    <strong class="{{ $isPast ? 'text-danger' : 'text-success' }}">
                                        {{ $isPast ? 'Peminjam telat ' . $differenceInDays . ' hari' : 'Buku sedang dipinjam' }}
                                    </strong>
                                @endif
                            </span>
                            <br>
                            @if ($isPast && $value->status != 'dikembalikan')
                                <input type="hidden" name="total_denda" id="" value="{{ $differenceInDays * $value->book->harga_denda }}">
                                <strong class="text-danger">Denda yang harus dibayar : Rp. {!! number_format($differenceInDays * $value->book->harga_denda, 0, ',', '.') !!}</strong>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('admin.master.book.detail_pinjaman', ['id_invoice' => $value->id_invoice]) }}" class="btn btn-outline-success w-200px">Detail Pinjaman</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    @endforeach

</div>
@endsection

@push('scripts')

<script>
    
    $(document).ready(function () {
        get_data()
    });

    function get_data() {
        
        console.log($('#status').val())
        var id_book = "{{ $data['id_book'] }}"
        var url = `{{ route("admin.master.book.history.data", ":id_book") }}`.replace(':id_book', id_book);
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "post",
            url: url,
            data: {
                status : $('#status').val()
            },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            dataType: "json",
            success: function (response) {
                // $.each(collection, function (k, v) { 
                //      ''
                // });
                console.log(response)
            },
            error: function (param) {  
                console.log('error')
            }
        });
    }

</script>

@endpush
