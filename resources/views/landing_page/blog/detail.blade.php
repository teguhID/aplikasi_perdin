@extends('layouts.app')

@section('content')

<div style="margin-top: 55px;">&nbsp;</div>

<div class="container py-4">

    <div class="row">
        <div class="col-md-12">
            <img src="{{ asset('') }}img/{{ $data->image_path }}" alt="{{ $data->image_path }}" width="400">
        </div>
        <div class="col-md-12">
            <small class="text-black-50">{{ $data->created_at }}</small>
        </div>
        <div class="col-md-12">
            <h4><b>{{ $data->judul }}</b></h4>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            {!! $data->desc !!}
        </div>
    </div>

</div>
@endsection

@push('scripts')

<script>
    
</script>

@endpush
