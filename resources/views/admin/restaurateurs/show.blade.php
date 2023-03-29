@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')
    <div class="d-flex my-4">

        {{-- Photo --}}
        <div class="rounded-5 image-size">
            {!! $utils->displayImage($restaurateur->image, $restaurateur->name) !!}
        </div>

        {{-- Info --}}
        <div class="p-3 restaurateur-body flex-grow-1">

            {{-- Name --}}
            <h4 class="mt-5 fw-bold fs-1 mb-4">{{$restaurateur->name}}.</h4>

            {{-- Type --}}
            
                <div class="d-flex gap-2 mb-2">
                    <h5 class="fw-bold">Tipo di cucina: </h5>
                    <div class="type-tags">
                        @foreach ($restaurateur->types as $type)
                            <p class="my-tag px-2 rounded my-bg-primary">{{$type->name}}</p>    
                        @endforeach
                    </div>
                </div>

            {{-- Address --}}
            <div class="d-flex gap-2 mb-2">
                <h5 class=" fw-bold"> Indirizzo:</h5>
                <p>{{$restaurateur->address}}</p>
            </div>

            {{-- Controlllers --}}
            <div class="d-flex gap-2 mt-4 mb-2">
                <a href="{{route('admin.restaurateurs.edit', $restaurateur->slug)}}" title="Modifica" class="btn btn-outline-dark"><i class="fa-solid fa-pen-to-square"></i> Modifica</a>
                <form action="{{route('admin.restaurateurs.destroy', $restaurateur->slug)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="confirm-delete btn btn-outline-dark" data-title="{{ $restaurateur->name }}" data-title="{{ $restaurateur->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella">
                        <i class="fa-solid fa-dumpster-fire"></i> Elimina
                    </a>
                </form> 
            </div>

        </div>
    </div>
@endsection