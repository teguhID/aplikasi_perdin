@extends('layouts.app')

@section('content')

<div style="margin-top: 55px;">&nbsp;</div>

<div class="container py-4">

    <div class="row">
        @foreach ($data['blog'] as $key => $value)
            <div class="col-md-3">
                <a href="{{ route('blog.detail', ['id_blog' => $value->id_blog]) }}">
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <img class="rounded" src="{{ asset('') }}img/{{ $value->image_path }}" alt="Title" style="width: 100%;" height="200"/>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <small class="text-black-50">{{ $value->created_at }}</small>
                            <h5 class="font-weight-bold text-black">{{ $value->judul }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

</div>
@endsection

@push('scripts')

<script>
    
</script>

@endpush
