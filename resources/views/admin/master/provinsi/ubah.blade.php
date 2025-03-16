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
                            <h5>Tambah Provinsi</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.master.provinsi.edit', ['id_provinsi' => $data['data']->id_provinsi]) }}" method="post" id="form_edit" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Pulau</span>
                            </div>
                            <div class="col-md-7">
                                <select name="id_pulau" id="" class="select">
                                    <option value="">&nbsp;</option>
                                    @foreach ($data["pulau"] as $k => $v)
                                        <option value="{{ $v->id_pulau }}" {{ $v->id_pulau == $data['data']->id_pulau ? "selected" : "" }}>{{ $v->name }}</option>
                                    @endforeach
                                </select>  
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Nama</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="name" id="" class="form-control" value="{{ $data['data']->name }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Deskripsi</span>
                            </div>
                            <div class="col-md-7">
                                <textarea type="text" name="desc" id="" class="form-control">{{ $data['data']->desc }}</textarea>
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
    $(document).ready(function() {

        $(".select").each(function() {
            new TomSelect(this, {
                plugins: ['remove_button']
            });
        });

        $('#form_edit').validate({
            rules: {
                name: {
                    required: true
                },
                desc: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong",
                },
                desc: {
                    required: "Deskripsi tidak boleh kosong"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
@endpush
