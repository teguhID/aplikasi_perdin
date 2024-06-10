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
                            <h5>Portofolio Toko Anda</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-outline-primary w-200px" onclick="show_modal_add()">
                                <small>Tambah Portofolio</small>
                            </button>
                        </div>
                    </div>  
                    <hr>

                    <div class="row">
                        @foreach ($data as $key => $value)
                            <div class="col-md-4 text-center mt-2">
                                <div class="row">
                                    <div class="col text-end">
                                        <form action="{{ route('admin.content.portofolio.delete', ['id_portofolio' => $value->id_portofolio]) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="image" value="{{ $value->image_path }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-100px">
                                                <small>
                                                    <i class="fa-solid fa-trash"></i> Hapus
                                                </small>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <img src="{{ asset('') }}img/{{ $value->image_path }}" alt="" width="250" height="250">
                                </div>
                            </div>
                        @endforeach

                    </div>
                    
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modal_add_portofolio" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <form action="{{ route('admin.content.portofolio.post') }}" method="post" id="form_delete" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row my-5">
                        <div class="col-md-12 text-center">
                            <label for="image" class="form-label" style="cursor: pointer;">
                                <i class="fas fa-upload me-2"></i>Upload Image
                            </label>
                            <input class="form-control d-none" type="file" name="image" id="image" accept="image/*" required>
                            
                            <div id="file-name" class="my-2"></div>
                            <img id="image-preview" src="{{ asset('') }}img/no_image.jpg" alt="Image Preview" width="250" height="250"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-secondary w-100px" data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="submit" class="btn btn-primary w-100px">
                                Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection

@push('scripts')

<script>
    $(document).ready(function() {
        $('#image').on('change', function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result).show();
                };
                reader.readAsDataURL(file);

                var fileName = $(this).val().split('\\').pop();
                $('#file-name').text('Selected file: ' + fileName);
            } else {
                $('#image-preview').hide();
                $('#file-name').text('');
            }
        });
    });

    function show_modal_add() {  
        $('#modal_add_portofolio').modal('show')
    }
</script>

@endpush
