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



    <div class="text-white py-5">
		<div class="d-flex justify-content-between align-items-center">
			<h1>PIATTI</h1>
			<a href="{{route('admin.plates.create') }}" class="btn btn-success">
				<i class="fa-solid fa-square-plus fa-lg fa-fw"></i> Aggiungi un nuovo piatto
			</a>
		</div>

		@if ($plates->isEmpty())
		<div class="d-flex align-items-center justify-content-center">
			<div class="alert border border white text-center m-0" role="alert">
				nessun piatto, <a href="{{route('admin.plates.create') }}">clicca qui</a> per aggiungerne uno
			</div>
		</div>
		
		@else
			<div class="plates-table">
				{{-- t-head --}}
				<div class="t-head grid-container fw-bold py-4 px-3">
					<div class="grid-item g-col-2">Nome</div>
					<div class="grid-item g-col-2">Ingredienti</div>
					<div class="grid-item g-col-2">Prezzo</div>
					<div class="grid-item g-col-2">Visibilità</div>
                    <div class="grid-item g-col-2">Disponibilità</div>
                    <div class="grid-item g-col-2">Descrizione</div>
                    <div class="grid-item g-col-2">Azioni</div>
				</div>

				{{-- t-body --}}
				<div class="t-body">
					@foreach ($plates as $item)
                        @if($restaurateur->id == $item->restaurateur_id)
                            <div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
                                <div class="grid-item">{{$item['name']}}</div>
                                <div class="grid-item">{{$item['ingredients']}}</div>
                                <div class="grid-item">{{$item['price']}} &euro;</div>
                                {!! $utils->changeboolean($item['visible']) !!}
                                {!! $utils->changeboolean($item['availability']) !!}
                                <div class="grid-item">{{$item['description']}}</div>
                                <div class="grid-item d-flex gap-3">
                                    <a href="{{ route('admin.plates.edit', $item) }}" class="text-white"  title="Modifica"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('admin.plates.show', $item->slug) }}" class="text-white"  title="Visualizza"><i class="fa-solid fa-eye"></i></a>
                                    <form class="d-inline-block" action="{{route('admin.plates.destroy', $item->slug)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a class="text-white p-0 confirm-delete" data-title="{{ $item->name }}" data-title="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella">
                                            <i class="fa-solid fa-dumpster-fire"></i>
                                        </a>
                                    </form> 
                                </div>
                            </div>
                        @endif
					@endforeach
				</div>
			</div>
		@endif
	</div>
	<div class="mt-3">
		@if(session('message'))
		<div class="alert alert-primary">
			{{session('message')}}
		</div>
		@endif
	</div>
    @include('admin.partials.modal_delete')



</div>
@endsection