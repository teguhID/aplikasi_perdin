@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Konfigurasi
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('buat_invoice') }}" method="post">
                        @csrf
                        
                        <section>
                            <div class="row">
                                <div class="col-md-3">
                                    Domain
                                </div>
                                <div class="col-md-8">
                                    @if (session('domain'))
                                        <p>{{ session('domain') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    Pilih Durasi
                                </div>
                                <div class="col-md-8">
                                    <select name="duration" class="form-control" onchange="hitung_total_harga(this.value)">
                                        <option value="">&nbsp;</option>
                                        <option value="1">1 bulan</option>
                                        <option value="3">3 bulan</option>
                                        <option value="12">1 tahun</option>
                                        <option value="24">2 tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 text-end">
                                    <small>Total Harga :</small>
                                    <small><b id="total_harga_txt">Rp 0</b></small>
                                    <input type="hidden" name="total_harga" id="total_harga" value="0">
                                </div>
                            </div>
                        </section>

                        <hr>

                        @auth
                        <section>
                            <div class="row">
                                <div class="col-md-3">
                                    Nama
                                </div>
                                <div class="col-md-8">
                                    {{ auth()->user()->name }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    Email
                                </div>
                                <div class="col-md-8">
                                    {{ auth()->user()->email }}
                                </div>
                            </div>
                        </section>
                        @endauth

                        <div class="row mt-4">
                            <div class="col-md-12">
                                @auth
                                <button type="submit" class="btn btn-success px-4 btn_checkout" disabled>
                                    <small>Checkout</small>
                                </button>
                                @else
                                <button type="button" class="btn btn-success px-4 btn_checkout" onclick="show_modal_konfirmasi()" disabled>
                                    <small>Checkout</small>
                                </button>
                                @endauth
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_konfirmasi" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Anda belum login, silahkan 
                <a href="{{ route('login') }}">login</a>
                terlebih dahulu atau <a href="{{ route('register') }}">daftar</a>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-secondary px-4">
                    <small>Login</small>
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary px-4"><small>Daftar</small></a>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    var total_harga = 100000

    $(document).ready(function () {
        $('#total_harga').html(formatNumber(total_harga))
    });

    function show_modal_konfirmasi() {  
        $('#modal_konfirmasi').modal('show')
    }

    function hitung_total_harga(value){

        console.log(value)
        if(value !== ''){
            $('.btn_checkout').removeAttr('disabled');
        }

        var total_harga_txt = total_harga * value
        $('#total_harga_txt').html(formatNumber(total_harga_txt))
        $('#total_harga').val(total_harga_txt)
    }
</script>

@endpush
