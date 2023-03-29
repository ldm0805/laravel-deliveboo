@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col">
            @foreach ($current_user as $user)              
            <h1 class="fw-bold">Ciao {{ $user['name'] }}!</h1>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    <div class="text-white py-2">
        <a class="btn-yellow text-white mb-4 " href="{{route('profile.edit')}}">
            <i class="fa-solid fa-pen-to-square"></i> Modifica i dati del tuo profilo
        </a>
    </div>
</div>
@endsection
