@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                Pilih Domain
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('pilih_domain') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" name="domain" id="domain" class="form-control" placeholder="ex : example.com" onkeyup="validate_button()">
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="btn_cari_domain" class="btn btn-success px-4" onclick="cari_domain()" disabled>
                                    <small>Cari Domain</small>
                                </button>
                            </div>
                        </div>
                        <div class="row mt-3 d-none" id="section_pesan_domain">
                            <div class="col-md-12 text-center my-3">
                                <b id="pesan_domain"></b>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" id="btn_cari_domain" class="btn btn-success px-4">
                                    <small>Pesan</small>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    function validate_button(){
        var input = $('#domain').val();
        if (input.length > 5) {
            $('#btn_cari_domain').removeAttr('disabled');
        }
    }

    function cari_domain(){
        $('#section_pesan_domain').removeClass('d-none');
        $('#pesan_domain').html('Domain tersedia')
    }   
</script>

@endpush
