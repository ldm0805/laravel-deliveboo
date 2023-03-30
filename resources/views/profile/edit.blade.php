@extends('layouts.admin')
@section('content')

<div class="container mt-4">

    {{-- Personal Info --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg w-50 mx-auto">
        @include('profile.partials.update-profile-information-form')
    </div>

    {{-- Update Password --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg w-50 mx-auto">
        @include('profile.partials.update-password-form')
    </div>

    {{-- Delete Account --}}
    <div class="card p-4 mb-4 bg-white shadow rounded-lg w-50 mx-auto">
        @include('profile.partials.delete-user-form')
    </div>

</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

     {!!JsValidator::formRequest('App\Http\Requests\ProfileUpdateRequest')!!}

@endsection
