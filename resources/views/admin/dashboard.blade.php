@extends('layouts.admin')
@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>

    <div class="text-white py-2 d-flex flex-row-reverse">
        <a class="btn-yellow text-white mb-4 " href="{{route('profile.edit')}}">
            <i class="fa-solid fa-pen-to-square"></i> Modifica i dati del tuo profilo
        </a>
    </div>
		
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('La Tua Dashboard') }}</div>
                <div class="card-body">
                    @foreach($current_user as $user)
                        <div>Ciao {{$user['name']}}!</div>
                        <div>Sei loggato con la mail: {{$user['email']}}</div>

                    @endforeach
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
