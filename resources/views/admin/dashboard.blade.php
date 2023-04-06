@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 text-center">
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
    <div class="text-center my-4">
        <h2>Cosa vuoi fare oggi?</h2>
        <a href="{{route('admin.restaurateurs.index')}}" class="btn btn-outline-dark mt-3">Gestisci ristorante</a>
    </div>
</div>
@endsection




