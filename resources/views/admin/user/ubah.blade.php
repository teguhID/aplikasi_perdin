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
                            <h5>Tambah Layanan</h5>
                        </div>
                    </div>
                    <hr>
                
                    <form action="{{ route('admin.user.edit', ['id' => $data['data']->id]) }}" method="post" id="form_edit" class="p-3" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Nama</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $data['data']->name }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Username</span>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="username" id="username" class="form-control" value="{{ $data['data']->username }}">
                            </div>
                        </div>
                        {{-- role --}}
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <span>Role</span>
                            </div>
                            <div class="col-md-7">
                                <select name="id_role" id="id_role" class="form-control">
                                    @foreach ($data['role'] as $item)
                                        <option value="{{ $item->id_role }}" {{ $data['data']->id_role == $item->id_role ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <section>
                            <div class="row mt-2" id="pass_existing">
                                <div class="col-md-3">
                                    <span>Password</span>
                                </div>
                                <div class="col-md-7">
                                    <input type="password" name="password" id="password_existing" class="form-control" value="{{ $data['data']->password }}" disabled>
                                </div>
                                <div class="col-md-2 mt-2">
                                    <a href="javascript:void(0)" onclick="ubah_password()"><small>Ubah Password</small></a>
                                </div>
                            </div>
                            <div class="row mt-2 d-none" id="pass_new">
                                <div class="col-md-3">
                                    <span>Password</span>
                                </div>
                                <div class="col-md-7">
                                    <input type="password" name="password" id="password_new" class="form-control">
                                </div>
                            </div>
                        </section>
                        
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
                name: {
                    required: true
                },
                email: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong",
                },
                email: {
                    required: "Email tidak boleh kosong"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

    });

    function ubah_password(){
        $('#pass_existing').addClass('d-none')
        $('#pass_new').removeClass('d-none')
    }
</script>
@endpush
