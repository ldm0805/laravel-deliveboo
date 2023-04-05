@extends('layouts.admin')
@section('content')

	<div class="py-5">
		<div class="d-flex justify-content-between align-items-center">
			<h1 class="fw-bold">Ristoranti</h1>
			<a href="{{route('admin.restaurateurs.create') }}" class="btn btn-outline-dark">
				<i class="fa-solid fa-square-plus fa-lg fa-fw"></i> Aggiungi un nuovo ristorante
			</a>
		</div>

		@if ($restaurateurs->isEmpty())
			<div class="d-flex align-items-center justify-content-center">
				<div class="alert border border-white text-center m-0" role="alert">
					nessun ristorante, <a href="{{route('admin.restaurateurs.create') }}">clicca qui</a> per aggiungerne uno
				</div>
			</div>
		@else
			<div class="restaurateurs-table">
				{{-- t-head --}}
				<div class="t-head grid-container fw-bold py-4 px-3">
					<div class="grid-item">Nome</div>
					<div class="grid-item">Indirizzo</div>
					<div class="grid-item">Azioni</div>
				</div>

				{{-- t-body --}}
				<div class="t-body">
					@foreach ($restaurateurs as $item)	
						<div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
							<div class="grid-item"><a href="{{ route('admin.restaurateurs.show', $item->slug) }}">{{$item['name']}}</a></div>
							<div class="grid-item">{{$item['address']}}</div>

							<div class="grid-item d-flex gap-3 item-controllers">
								<a href="{{ route('admin.restaurateurs.edit', $item) }}"  title="Modifica"><i class="fa-solid fa-pen-to-square"></i></a>
								<a href="{{ route('admin.restaurateurs.show', $item->slug) }}"  title="Cancella"><i class="fa-solid fa-eye"></i></a>
								<a href="{{route('admin.plates.create', $item->id) }}"><i class="fa-solid fa-file-circle-plus"></i></a>
								<form action="{{route('admin.restaurateurs.destroy', $item->slug)}}" method="POST">
									@csrf
									@method('DELETE')
									<a class="p-0 confirm-delete" data-title="{{ $item->name }}" data-title="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella">
										<i class="fa-solid fa-dumpster-fire"></i>
									</a>
								</form> 
							</div>
						</div>
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

@endsection