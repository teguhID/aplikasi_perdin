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
                            <h5>Tambah Blog</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.blog.edit', ['id_blog' => $data->id_blog]) }}" method="post" id="form_edit" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="old_image" value="{{ $data->image_path }}">
                        <div class="row">
                            <div class="col-md-3">
                                <span>Gambar</span>
                            </div>
                            <div class="col-md-7">
                                <input type="file" name="image" id="image" class="form-control" accept="image/*">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <img id="image_preview" src="{{ asset('') }}img/{{ $data->image_path }}" alt="Image Preview" class="img-fluid" width="200">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Judul</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="judul" id="" class="form-control" value="{{ $data->judul }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Isi</span>
                            </div>
                            <div class="col-md-7">
                                <input type="hidden" name="desc" id="desc" value="{{ $data->desc }}"/>
                                <div id="editor-container" style="height: 250px;"></div>
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
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
<script>
    $(document).ready(function() {

        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'image']
                ]
            }
        });

        var htmlContent = '{!! $data->desc !!}';
        quill.clipboard.dangerouslyPasteHTML(htmlContent);

        $('#image').change(function() {
            const input = this;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    $('#image_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
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
                var content = quill.root.innerHTML;
                $('#desc').val(content);
                form.submit();
            }
        });
    });
</script>
@endpush
