@extends('layouts.admin')

@push('styles')
<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
                            <h5>Daftar List Status</h5>
                        </div>
                        <div class="col-md-6 text-end">
                            <a href="{{ route('admin.master.status.add_view') }}" class="btn btn-outline-primary w-200px">
                                <small>Tambah Status</small>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="summary" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Desc</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td class="text-center"><small>{{ $key + 1 }}</small></td>
                                            <td class="text-center"><small>{{ $value->name }}</small></td>
                                            <td class="text-center"><small>{{ $value->desc }}</small></td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('admin.master.status.edit_view', ['id_status' => $value->id_status]) }}" class="btn btn-sm btn-outline-primary w-100px">
                                                            <small>Ubah Status</small>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-sm btn-outline-secondary w-100px" onclick="show_modal_hapus('{{ $value->id_status }}', '{{ $value->name }}')">
                                                            <small>Hapus Status</small>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="modal fade" id="modal_hapus" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 my-5 text-center">
                        <span id="text_modal_hapus">Hapus Data ?</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <form action="" method="post" id="form_delete">
                            @csrf
                            <button type="button" class="btn btn-primary w-100px" data-bs-dismiss="modal">
                                Tutup
                            </button>
                            <button type="submit" class="btn btn-secondary w-100px">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summary').DataTable();
    });

    function show_modal_hapus(id_status, name){
        var url = "{{ route('admin.master.status.delete', ['id_status' => ':id_status']) }}";
        url = url.replace(':id_status', id_status);

        $('#text_modal_hapus').html('Apakah anda ingin menghapus ' + name + ' ?')
        $('#form_delete').attr('action', url)
        $('#modal_hapus').modal('show')
    }
</script>

@endpush
