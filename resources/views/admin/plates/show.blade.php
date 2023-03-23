@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="text-white">
    <h4 class="mt-5">Ristorante: {{$plate->name}}.</h4>
    {!! $utils->displayImage($plate->image, $plate->name) !!}
    <p>Ingredienti: {{$plate->ingredients}}</p>
    <p>Indirizzo: {{$plate->price}}</p>
    <p>Visibilità:
        @if($plate['visible'])
            <i class="fa-solid fa-check" style="color: #008000;"></i>
        @else
            <i class="fa-solid fa-x" style="color: #ff0000;"></i>
        @endif
    </p>
    <p>Diponibilità:
        @if($plate['availability'])
            <i class="fa-solid fa-check" style="color: #008000;"></i>
        @else
            <i class="fa-solid fa-x" style="color: #ff0000;"></i>
        @endif
    </p>
    <p>Descrizione: {{$plate->description}}</p>
    

</div>
@endsection