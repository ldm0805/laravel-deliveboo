@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header my-bg-primary text-white">{{ __('Register') }}</div>

                    <div class="card-body my-bg-light ">

                        {{-- Registration Form --}}
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            
                            {{-- Name Label --}}
                            <div class="mb-4 row">
                                <label for="name" class="col-md-4 col-form-label text-md-right my-text-dark">{{ __('Nome') }}*</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                </div>
                            </div>

                             {{-- Partita Iva Label --}}
                             <div class="mb-4 row">
                                <label class="col-md-4 col-form-label text-md-right my-text-dark" for="iva">Partiva Iva*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="p_iva" id="p_iva" maxlength="11">
                                 
                                </div>
                            </div>   

                            {{-- Address Label --}}
                            <div class="mb-4 row">
                                <label class="col-md-4 col-form-label text-md-right my-text-dark" for="indirizzo">Indirizzo*</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="address" id="indirizzo">
                                 
                                </div>
                            </div>

                            {{-- Cechbox Label --}}
                            <div class="mb-4 row">
                                <label for="type" class="col-md-4 col-form-label text-md-right my-text-dark">{{ __('Seleziona cucina') }}*</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('types') is-invalid @enderror" id="types" multiple name="types[]">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                    <div id="error-message" style="display: none;" class="invalid-feedback">Seleziona almeno una cucina</div>
                                </div>
                            </div>

                            {{-- Email Label --}}
                            <div class="mb-4 row">
                                <label for="email" class="col-md-4 col-form-label text-md-right my-text-dark">{{ __('E-Mail Address') }}*</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                  
                                </div>
                            </div>

                            {{-- Password Label --}}
                            <div class="mb-4 row">
                                <label for="password" class="col-md-4 col-form-label text-md-right my-text-dark">{{ __('Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                            </div>

                            {{-- Confirm Password Label --}}
                            <div class="mb-4 row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right my-text-dark">{{ __('Confirm Password') }}*</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            {{-- Submit Label --}}
                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">invio</button>
                                </div>
                            </div>
                        </form>
                        <div>
                            <p class="text-end">I dati contrassegnati con * sono obbligatori.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
@endsection
