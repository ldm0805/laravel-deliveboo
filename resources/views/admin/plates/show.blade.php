@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')

<div class="text-white">
    {{-- Nome del piatto --}}
    <h4 class="mt-5">Nome del piatto: {{$plate->name}}.</h4>


<div class="d-flex my-4">

    {{-- Photo --}}
    <div class="rounded-5 image-size">
        {!! $utils->displayImage($plate->image, $plate->name) !!}
    </div>

    {{-- Info --}}
    <div class="p-3 restaurateur-body flex-grow-1">

        {{-- Name and drìescription--}}
        <div class="mb-4">
            <h4 class="fw-bold fs-1">{{$plate->name}}.</h4>
            <p>{{$plate->description}}</p>
        </div>

        {{-- Ingredients --}}
        
            <div class="d-flex gap-2 mb-2">
                <h5 class="fw-bold">Ingredienti: </h5>
                <div class="type-tags">
                    {{ $plate->ingredients }}
                </div>
            </div>

        {{-- Price --}}
        <div class="d-flex gap-2 mb-2">
            <h5 class="fw-bold"> Prezzo:</h5>
            <p>{{$plate->price}}€</p>
        </div>

        {{-- Visibility --}}
        <div class="d-flex gap-2 mb-2">
            <h5 class="fw-bold"> Visibilità:</h5>
            {{-- Funzione per visualizzare la visibilità con delle icone--}}
            <p>{!! $utils->changeboolean($plate['visible']) !!}</p>
        </div>

        {{-- Availability --}}
        <div class="d-flex gap-2 mb-2">
            <h5 class="fw-bold"> Disponibilità:</h5>
            {{-- Funzione per visualizzare la disponibilità con delle icone--}}
            <p>{!! $utils->changeboolean($plate['availability']) !!}</p>
        </div>

        {{-- Controlllers --}}
        <div class="d-flex gap-2 mt-4 mb-2">
            <a href="{{route('admin.plates.edit', $plate->slug)}}" title="Modifica" class="btn btn-outline-dark"><i class="fa-solid fa-pen-to-square"></i> Modifica</a>
            <form action="{{route('admin.plates.destroy', $plate->slug)}}" method="POST">
                @csrf
                @method('DELETE')
                <a class="confirm-delete btn btn-outline-dark" data-title="{{ $plate->name }}" data-title="{{ $plate->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella">
                    <i class="fa-solid fa-dumpster-fire"></i> Elimina
                </a>
            </form> 
        </div>

    </div>
</div>
@endsection