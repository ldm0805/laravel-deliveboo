@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <h1 class="fw-bold fs-1 mb-4">Benvenuti su DeliveBoo!</h1>
                <p class="fs-2">Hai fame?</p>

                {{-- Access controllers --}}
                <div class="d-flex gap-2 justify-content-center">
                    <a href="{{ route('login') }}" class="btn btn-outline-dark">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-dark">{{ __('Register') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection