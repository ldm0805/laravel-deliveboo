@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="text-white">
    <h4 class="mt-5">Ristorante: {{$restaurateur->name}}.</h4>
    <div class=" image-size">
    {!! $utils->displayImage($restaurateur->image, $restaurateur->name) !!}
    </div>
    <h5>Tipo di cucina: </h5>
    @foreach ($restaurateur->types as $type)
    <p>{{$type->name}}</p>
        
    @endforeach
    <p><strong>Indirizzo:</strong> {{$restaurateur->address}}</p>
    <h2>MENU</h2>
    @foreach($plates as $plate)
        @if($restaurateur->id == $plate->restaurateur_id)
            {{ $plate->name }}
        @endif
    @endforeach
</div>
@endsection