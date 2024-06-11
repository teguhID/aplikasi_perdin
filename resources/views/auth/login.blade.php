@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 80vh;">
    {{-- <div class="row">
        <div class="col-md-12"> --}}
            {{-- <div class="card"> --}}

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-1 justify-content-center">
                            <div class="col-md-6 text-center">
                                <input id="email" type="email" class="form-control" name="email" placeholder="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-6 text-center">
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary w-50">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            {{-- </div> --}}
        {{-- </div>
    </div> --}}
</div>
@endsection
