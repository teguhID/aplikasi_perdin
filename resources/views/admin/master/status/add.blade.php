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
                            <h5>Tambah Status</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.master.status.post') }}" method="post" id="form_add" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Name</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="name" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Description</span>
                            </div>
                            <div class="col-md-7">
                                <textarea name="desc" id="" class="form-control" cols="20" rows="5"></textarea>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-200px">
                                    <small>Tambah</small>
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

<script>
    $(document).ready(function() {
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
</script>
@endpush
