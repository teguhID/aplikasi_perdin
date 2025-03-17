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
                            <h5>Tambah Pengajuan Perdin</h5>
                        </div>
                    </div>
                
                    <form action="{{ route('admin.perdin.post') }}" method="post" id="form_add" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <i class="fa-solid fa-plane-departure me-2"></i> Kota Asal
                                        <hr>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <span>Pulau</span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="id_pulau" id="id_pulau_asal" class="select" onchange="get_provinsi_asal(this.value)">
                                            <option value="">&nbsp;</option>
                                            @foreach ($data["pulau"] as $k => $v)
                                                <option value="{{ $v->id_pulau }}">{{ $v->name }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <span>Provinsi</span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="id_provinsi" id="id_provinsi_asal" class="select" onchange="get_kota_asal(this.value)">
                                            
                                        </select>  
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <span>Kota</span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="id_kota_asal" id="id_kota_asal" class="select" onchange="getJarak()">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <i class="fa-solid fa-plane-arrival me-2"></i> Kota Tujuan
                                        <hr>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <span>Pulau</span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="id_pulau" id="id_pulau_tujuan" class="select" onchange="get_provinsi_tujuan(this.value)">
                                            <option value="">&nbsp;</option>
                                            @foreach ($data["pulau"] as $k => $v)
                                                <option value="{{ $v->id_pulau }}">{{ $v->name }}</option>
                                            @endforeach
                                        </select>  
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <span>Provinsi</span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="id_provinsi" id="id_provinsi_tujuan" class="select" onchange="get_kota_tujuan(this.value)">
                                            
                                        </select>  
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        <span>Kota</span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="id_kota_tujuan" id="id_kota_tujuan" class="select" onchange="getJarak()">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <i class="bi bi-calendar me-2"></i> Tanggal Keberangkatan
                                        <hr>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="row mt-2">
                                            <div class="col-md-3 mt-2">
                                                <span>Tanggal Berangkat</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="date" name="date_berangkat" id="date_berangkat" class="form-control" onchange="getDays()">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row mt-2">
                                            <div class="col-md-3 mt-2">
                                                <span>Tanggal Pulang</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="date" name="date_pulang" id="date_pulang" class="form-control" onchange="getDays()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-3">
                                        Keterangan
                                    </div>
                                    <div class="col-md-7">
                                        <textarea name="keterangan" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <i class="bi bi-calendar me-2"></i> Informasi
                                        <hr>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <span>Durasi Perjalanan</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="hidden" name="durasi" id="">
                                                <b id="durasi">0</b> Hari
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <span>Jarak Perjalanan</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="hidden" name="jarak" id="">
                                                <b id="jarak">0</b> Km
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <span>Pengajuan Anggaran / hari</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="hidden" name="uang_saku" id="">
                                                <span class="mata_uang">Rp.</span> <b id="uang_saku">0</b>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <span>Total Pengajuan Anggaran</span>
                                            </div>
                                            <div class="col-md-7">
                                                <input type="hidden" name="total_uang_saku" id="">
                                                <span class="mata_uang">Rp.</span> <b id="total_uang_saku">0</b>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="mata_uang">

                                </div>
                            </div>
                        </div>
                        

                        <div class="row mt-5">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-200px">
                                    <small>Ajukan</small>
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
    var url_data_kota = "{{ route('admin.master.kota.list.data', ':id_provinsi') }}";

    let tomSelectProvinsiAsal, toSelectKotaAsal;
    let tomSelectProvinsiTujuan, toSelectKotaTujuan;

    $(document).ready(function() {
        // Asal
        tomSelectPulauAsal = new TomSelect('#id_pulau_asal', {
            plugins: ['remove_button']
        });

        tomSelectProvinsiAsal = new TomSelect('#id_provinsi_asal', {
            plugins: ['remove_button']
        });

        toSelectKotaAsal = new TomSelect('#id_kota_asal', {
            plugins: ['remove_button']
        });

        // Tujuan
        tomSelectPulauTujuan = new TomSelect('#id_pulau_tujuan', {
            plugins: ['remove_button']
        });

        tomSelectProvinsiTujuan = new TomSelect('#id_provinsi_tujuan', {
            plugins: ['remove_button']
        });

        toSelectKotaTujuan = new TomSelect('#id_kota_tujuan', {
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

    // Asal
    function get_provinsi_asal(id_pulau) {  
        
        url = url_data_provinsi.replace(':id_pulau', id_pulau);
        
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            beforeSend: function() {
                tomSelectProvinsiAsal.clear();
                tomSelectProvinsiAsal.clearOptions();
            },
            success: function(data) {
                
                if (data.length > 0) {
                    data.forEach(function(provinsi) {
                        tomSelectProvinsiAsal.addOption({
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

    function get_kota_asal(id_provinsi) {  
        
        url = url_data_kota.replace(':id_provinsi', id_provinsi);
        
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            beforeSend: function() {
                toSelectKotaAsal.clear();
                toSelectKotaAsal.clearOptions();
            },
            success: function(data) {
                
                if (data.length > 0) {
                    data.forEach(function(provinsi) {
                        toSelectKotaAsal.addOption({
                            value: provinsi.id_kota + '|' + provinsi.lat + '|' + provinsi.long + '|' + provinsi.id_provinsi + '|' + provinsi.id_pulau + '|' + provinsi.is_luar_negri,
                            text: provinsi.name
                        });
                    });
                }
                
            },
            error: function(xhr, status, error) {
                
            }
        });
    }

    // Tujuan
    function get_provinsi_tujuan(id_pulau) {  
        
        url = url_data_provinsi.replace(':id_pulau', id_pulau);
        
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            beforeSend: function() {
                tomSelectProvinsiTujuan.clear();
                tomSelectProvinsiTujuan.clearOptions();
            },
            success: function(data) {
                
                if (data.length > 0) {
                    data.forEach(function(provinsi) {
                        tomSelectProvinsiTujuan.addOption({
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

    function get_kota_tujuan(id_provinsi) {  
        
        url = url_data_kota.replace(':id_provinsi', id_provinsi);
        
        $.ajax({
            url: url,
            type: "GET",
            dataType: "json",
            beforeSend: function() {
                toSelectKotaTujuan.clear();
                toSelectKotaTujuan.clearOptions();
            },
            success: function(data) {
                
                if (data.length > 0) {
                    data.forEach(function(provinsi) {
                        toSelectKotaTujuan.addOption({
                            value: provinsi.id_kota + '|' + provinsi.lat + '|' + provinsi.long + '|' + provinsi.id_provinsi + '|' + provinsi.id_pulau + '|' + provinsi.is_luar_negri,
                            text: provinsi.name
                        });
                    });
                }
                
            },
            error: function(xhr, status, error) {
                
            }
        });
    }

    function getDays() {
        var date_berangkat = $('#date_berangkat').val()
        var date_pulang = $('#date_pulang').val()

        var date1 = new Date(date_berangkat);
        var date2 = new Date(date_pulang);

        var diffTime = Math.abs(date2 - date1);

        var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        var durasi_perjalanan = diffDays ? diffDays : 0

        var uang_saku = $('[name="uang_saku"]').val()
        var total_uang_saku = uang_saku * durasi_perjalanan

        $('[name="total_uang_saku"]').val(total_uang_saku)
        $('[name="durasi"]').val(durasi_perjalanan)

        $('#total_uang_saku').html(formatRupiah(total_uang_saku))
        $('#durasi').html(durasi_perjalanan)
    }

    // HITUNG JARAK
    function getJarak(){

        // RESET
        $('#date_berangkat').val('')
        $('#date_pulang').val('')

        $('[name="total_uang_saku"]').val(0)
        $('[name="durasi"]').val(0)

        $('#total_uang_saku').html(formatRupiah(0))
        $('#durasi').html(0)


        var id_kota_asal = $('#id_kota_asal').val()
        var id_kota_tujuan = $('#id_kota_tujuan').val()
        
        var lat_asal = id_kota_asal.split("|")[1];
        var long_asal = id_kota_asal.split("|")[2];
        var id_provinsi_asal = id_kota_asal.split("|")[3];
        var id_pulau_asal = id_kota_asal.split("|")[4];
        var is_luar_negri_asal = id_kota_asal.split("|")[5];

        var lat_tujuan = id_kota_tujuan.split("|")[1];
        var long_tujuan = id_kota_tujuan.split("|")[2];
        var id_provinsi_tujuan = id_kota_tujuan.split("|")[3];
        var id_pulau_tujuan = id_kota_tujuan.split("|")[4];
        var is_luar_negri_tujuan = id_kota_tujuan.split("|")[5];

        var jarak = hitungJarak(lat_asal, long_asal, lat_tujuan, long_tujuan).toFixed(0);
        jarak = !isNaN(jarak) ? jarak : 0

        $('[name="jarak"]').val(jarak)
        $('#jarak').html(jarak)

        getBiaya(jarak, id_provinsi_asal, id_provinsi_tujuan, id_pulau_asal, id_pulau_tujuan, is_luar_negri_asal, is_luar_negri_tujuan)
    }

    function hitungJarak(lat1, lon1, lat2, lon2) {
        const R = 6371; // Radius bumi dalam kilometer
        const dLat = deg2rad(lat2 - lat1);
        const dLon = deg2rad(lon2 - lon1);
        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        const distance = R * c; // Jarak dalam kilometer
        return distance;
    }

    function deg2rad(deg) {
        return deg * (Math.PI / 180);
    }

    // HITUNG BIAYA
    function getBiaya(jarak, id_provinsi_asal, id_provinsi_tujuan, id_pulau_asal, id_pulau_tujuan, is_luar_negri_asal, is_luar_negri_tujuan){
        var uang_saku = 0
        var mata_uang = ''

        // ==============================================================
        if (
            jarak >= 0 && 
            jarak <= 60
        ){
            uang_saku = 0
            mata_uang = 'Rp'
            console.log('Uang Saku', 0)
            console.log('Mata Uang', 'Rp')
        } 
        
        // ==============================================================
        if (
            jarak > 60 && 
            (id_provinsi_asal == id_provinsi_tujuan) && 
            (id_pulau_asal == id_pulau_tujuan) &&
            (
                (is_luar_negri_asal == 0 || 
                is_luar_negri_asal == '0')
                &&
                (is_luar_negri_tujuan == 0 || 
                is_luar_negri_tujuan == '0')
            )
        ){
            uang_saku = 200000
            mata_uang = 'Rp'
            console.log('Uang Saku', 200000)
            console.log('Mata Uang', 'Rp')
        }

        // ==============================================================
        if (
            jarak > 60 && 
            (id_provinsi_asal != id_provinsi_tujuan) && 
            (id_pulau_asal == id_pulau_tujuan) &&
            (
                (is_luar_negri_asal == 0 || 
                is_luar_negri_asal == '0')
                &&
                (is_luar_negri_tujuan == 0 || 
                is_luar_negri_tujuan == '0')
            )
        ){
            uang_saku = 250000
            mata_uang = 'Rp'
            console.log('Uang Saku', 250000)
            console.log('Mata Uang', 'Rp')
        }

        // ==============================================================
        if (
            jarak > 60 && 
            (id_provinsi_asal != id_provinsi_tujuan) && 
            (id_pulau_asal != id_pulau_tujuan) &&
            (
                (is_luar_negri_asal == 0 || 
                is_luar_negri_asal == '0')
                &&
                (is_luar_negri_tujuan == 0 || 
                is_luar_negri_tujuan == '0')
            )
        ){
            uang_saku = 300000
            mata_uang = 'Rp'
            console.log('Uang Saku', 300000)
            console.log('Mata Uang', 'Rp')
        }

        // ==============================================================
        if (
            is_luar_negri_asal == 1 || 
            is_luar_negri_asal == '1' ||
            is_luar_negri_tujuan == 1 || 
            is_luar_negri_tujuan == '1'
        ){
            uang_saku = 50
            mata_uang = 'USD'
            console.log('Uang Saku', 50)
            console.log('Mata Uang', 'USD')
        }

        $('#uang_saku').html(formatRupiah(uang_saku))
        $('.mata_uang').html(mata_uang)

        $('[name="uang_saku"]').val(uang_saku)
        $('[name="mata_uang"]').val(mata_uang)
    }


</script>
@endpush
