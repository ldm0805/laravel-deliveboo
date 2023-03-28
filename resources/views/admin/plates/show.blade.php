@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="text-white">
    {{-- Nome del piatto --}}
    <h4 class="mt-5">Nome del piatto: {{$plate->name}}.</h4>

    {{-- Funzione per visualizzare l'immagine --}}
    <div class="my-3 image-size">
        {!! $utils->displayImage($plate->image, $plate->name) !!}
    </div>
    
    {{-- Ingredienti --}}
    <p>Ingredienti: {{$plate->ingredients}}</p>

    {{-- Indirizzo --}}
    <p>Indirizzo: {{$plate->price}}</p>

    {{-- Funzione per visualizzare la visibilità con delle icone--}}
    <p>Visibilità:
        {!! $utils->changeboolean($plate['visible']) !!}
    </p>

    {{-- Funzione per visualizzare la disponibilità con delle icone--}}
    <p>Diponibilità:
        {!! $utils->changeboolean($plate['availability']) !!}
    </p>

    {{-- Descrizione --}}
    <p>Descrizione: {{$plate->description}}</p>
    
</div>
@endsection