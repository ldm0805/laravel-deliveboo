@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="text-white">
    <h4 class="mt-5">Ristorante: {{$plate->name}}.</h4>
    {!! $utils->displayImage($plate->image, $plate->name) !!}
    <p>Email: {{$plate->ingredients}}</p>
    <p>Indirizzo: {{$plate->price}}</p>
    <p>P. IVA: {{$plate->visible}}</p>
    <p>P. IVA: {{$plate->avaiability}}</p>
    <p>P. IVA: {{$plate->description}}</p>
    

</div>
@endsection