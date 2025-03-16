@extends('layouts.admin')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-5 py-4">
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <h5>Tambah Layanan</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.master.kota.edit', ['id_kota' => $data['data']->id_kota]) }}" method="post" id="form_edit" class="p-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Pulau</span>
                            </div>
                            <div class="col-md-7">
                                <select name="id_pulau" id="id_pulau" class="select" onchange="get_provinsi(this.value)">
                                    <option value="">&nbsp;</option>
                                    @foreach ($data["pulau"] as $k => $v)
                                        <option value="{{ $v->id_pulau }}" {{ $v->id_pulau == $data['data']->id_pulau ? 'selected' : '' }}>{{ $v->name }}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Provinsi</span>
                            </div>
                            <div class="col-md-7">
                                <select name="id_provinsi" id="id_provinsi" class="select">
                                    <option value="">&nbsp;</option>
                                    @foreach ($data["provinsi"] as $k => $v)
                                        <option value="{{ $v->id_provinsi }}" {{ $v->id_provinsi == $data['data']->id_provinsi ? 'selected' : '' }}>{{ $v->name }}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Kota</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="name" id="" class="form-control" value="{{ $data['data']->name }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Longitude</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="long" id="" class="form-control" value="{{ $data['data']->long }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Latitude</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="lat" id="" class="form-control" value="{{ $data['data']->lat }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Luar Negri</span>
                            </div>
                            <div class="col-md-7">
                                <input name="is_luar_negri" id="" class="form-check-input" type="checkbox" value="1" {{ $data['data']->is_luar_negri == 1 ? 'checked' : '' }}>
                            </div>
                        </div>
                       
                        <hr>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-200px">
                                    <small>Ubah</small>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>

<script>

    var url_data_provinsi = "{{ route('admin.master.provinsi.list.data', ':id_pulau') }}";
    let tomSelectProvinsi;

    $(document).ready(function() {
        tomSelectPulau = new TomSelect('#id_pulau', {
            plugins: ['remove_button']
        });

        tomSelectProvinsi = new TomSelect('#id_provinsi', {
            plugins: ['remove_button']
        });

        $('#form_add').validate({
            rules: {
                name: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong",
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        
    });

    function get_provinsi(id_pulau) {  
        
        url = url_data_provinsi.replace(':id_pulau', id_pulau);
        
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            beforeSend: function() {
                tomSelectProvinsi.clear();
                tomSelectProvinsi.clearOptions();
            },
            success: function(data) {
                
                if (data.length > 0) {
                    data.forEach(function(provinsi) {
                        tomSelectProvinsi.addOption({
                            value: provinsi.id_provinsi,
                            text: provinsi.name
                        });
                    });
                }
                
            },
            error: function(xhr, status, error) {
                
            }
        });
    }
</script>
@endpush
