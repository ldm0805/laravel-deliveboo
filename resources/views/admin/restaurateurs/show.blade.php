@extends('layouts.admin')
@inject('utils', 'App\Utils\Utils')
@section('content')

    {{-- Restaurant --}}
    <div class="d-flex my-4 flex-column flex-md-row">

        {{-- Photo --}}
        <div class="rounded-5 image-size restaurant-photo">
            {!! $utils->displayImage($restaurateur->image, $restaurateur->name) !!}
        </div>

        {{-- Info --}}
        <div class="p-3 restaurateur-body flex-grow-1">

            {{-- Name --}}
            <h1 class="fw-bold mb-4 restaurant-name">{{$restaurateur->name}}</h1>

            {{-- Type --}}
            <div class="d-flex gap-2 mb-2">
                <h5 class="fw-bold">Tipo di cucina: </h5>
                <div class="type-tags d-flex gap-2">
                    @foreach ($restaurateur->types as $type)
                        <p class="my-tag px-2 rounded my-bg-primary">{{$type->name}}</p>    
                    @endforeach
                </div>
            </div>

            {{-- Address --}}
            <div class="d-flex gap-2 mb-2">
                <h5 class=" fw-bold">Indirizzo:</h5>
                <p>{{$restaurateur->address}}</p>
            </div>

            {{-- Controllers --}}
            <div class="d-flex gap-2 mt-4 mb-2">
                <a href="{{route('admin.plates.create', $restaurateur->id) }}" title="Aggiungi" class="btn btn-outline-dark"><i class="fa-solid fa-file-circle-plus"></i>  Aggiungi Piatto</a>
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
    <div class="plates-table">
        {{-- T-Head --}}
        <div class="grid-item t-head grid-container fw-bold py-4 px-3">
            <div class="grid-item g-col-2">Nome</div>
            <div class="grid-item g-col-2">Ingredienti</div>
            <div class="grid-item g-col-2">Prezzo</div>
            <div class="grid-item g-col-2 d-none d-md-block">Visibilità</div>
            <div class="grid-item g-col-2 d-none d-md-block">Disponibilità</div>
            <div class="grid-item g-col-2 d-none d-md-block">Descrizione</div>
            <div class="grid-item g-col-2">Azioni</div>
        </div>
    {{-- Plates --}}
    <div class="t-body">
        @foreach ($plates as $item)
            @if($restaurateur->id == $item->restaurateur_id)
                <div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
                    <div class="grid-item g-col-2">{{$item['name']}}</div>
                    <div class="grid-item g-col-2">{{$item['ingredients']}}</div>
                    <div class="grid-item g-col-2">{{$item['price']}} €</div>
                    <div class="grid-item g-col-2 d-none d-md-block">{!! $utils->changeboolean($item['visible']) !!}</div>
                    <div class="grid-item g-col-2 d-none d-md-block"> {!! $utils->changeboolean($item['availability']) !!}</div>
                    <div class="grid-item g-col-2 d-none d-md-block">{{$item['description']}}</div>
                    <div class="grid-item g-col-2 d-flex gap-3 flex-md-row flex-column justify-content-center align-items-center">
                        <a href="{{ route('admin.plates.edit', $item) }}" class="text-dark" title="Modifica"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="{{ route('admin.plates.show', $item->slug) }}" class="text-dark" title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                        <form class="d-inline-block" action="{{route('admin.plates.destroy', $item->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a class="text-dark p-0 confirm-delete" data-title="{{ $item->name }}" data-title="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella">
                                <i class="fa-solid fa-dumpster-fire"></i>
                            </a>
                        </form>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @if(session('message'))
        <div class="mt-3">
            <div class="alert alert-primary">
                {{session('message')}}
            </div>
        </div>
    @endif
    @include('admin.partials.modal_delete')
@endsection