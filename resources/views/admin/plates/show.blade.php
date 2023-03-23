@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="text-white">
    <h4 class="mt-5">Ristorante: {{$plate->name}}.</h4>
    {!! $utils->displayImage($plate->image, $plate->name) !!}
    <p>Ingredienti: {{$plate->ingredients}}</p>
    <p>Indirizzo: {{$plate->price}}</p>
    <p>Visibilità: {{$plate->visible}}</p>
    <p>Diponibilità: {{$plate->avaiability}}</p>
    <p>Descrizione: {{$plate->description}}</p>
    

</div>
@endsection