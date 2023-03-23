@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
<div class="text-white">
    <h4 class="mt-5">Ristorante: {{$restaurateur->name}}.</h4>
    {!! $utils->displayImage($restaurateur->image, $restaurateur->name) !!}
    <p>Email: {{$restaurateur->email}}</p>
    <p>Indirizzo: {{$restaurateur->address}}</p>
    <p>P. IVA: {{$restaurateur->p_iva}}</p>
</div>
@endsection