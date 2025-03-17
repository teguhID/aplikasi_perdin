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
                            <h5>Daftar List User</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table id="summary" class="table">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 10%">No</th>
                                        <th style="width: 35%">Name</th>
                                        <th style="width: 35%">Username</th>
                                        <th style="width: 35%">Role</th>
                                        <th style="width: 20%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td class="text-center"><small>{{ $key + 1 }}</small></td>
                                            <td><small>{{ $value->name }}</small></td>
                                            <td><small>{{ $value->username }}</small></td>
                                            <td><small>{{ $value->role->name }}</small></td>
                                            <td class="text-center">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('admin.user.edit_view', ['id' => $value->id]) }}" class="btn btn-sm btn-outline-primary w-100px">
                                                            <small>Ubah User</small>
                                                        </a>
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


@endsection

@push('scripts')

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summary').DataTable();
    });
</script>

@endpush
