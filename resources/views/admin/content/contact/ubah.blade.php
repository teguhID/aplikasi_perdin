@extends('layouts.admin')

@push('styles')
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form action="{{ route('admin.content.contact.edit') }}" method="post" id="form_edit">
                @csrf
                <div class="card">
                    <div class="card-body px-5 py-4">
                        <div class="row pt-3">
                            <div class="col-md-6">
                                <h5>Ubah Kontak</h5>
                            </div>
                            <div class="col-md-6 text-end">
                                <button type="submit" class="btn btn-outline-primary w-200px">
                                    <small>Simpan Kontak</small>
                                </button>
                            </div>
                        </div>
                        <hr>
                    
                        <div class="row">
                            <div class="col-md-12">

                                @foreach ($data as $key => $value)
                                    <div class="row mt-2">
                                        <div class="col-md-2">
                                            <i class="{{ $value->icon }}"></i>
                                            {{ $value->name }}
                                        </div>
                                        <div class="col-md-7">
                                            <input type="text" name="{{ $value->name }}" class="form-control" value="{{ $value->desc }}">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
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
   
</script>
@endpush
