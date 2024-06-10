@extends('layouts.admin')

@push('styles')
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body px-5 py-4">
                    <div class="row pt-3">
                        <div class="col-md-6">
                            <h5>Ubah Profile</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.content.profile.edit', ['id_profile' => $data->id_profile]) }}" method="post" id="form_edit" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-3">
                                <span>Judul</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="judul" id="judul" value="{{ $data->judul }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Deskripsi</span>
                            </div>
                            <div class="col-md-7">
                                <textarea class="form-control" name="desc" id="desc" cols="30" rows="10">{{ $data->desc }}</textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {

        $('#form_edit').validate({
            rules: {
                judul: {
                    required: true
                },
                desc: {
                    required: true
                }
            },
            messages: {
                judul: {
                    required: "Judul tidak boleh kosong",
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
