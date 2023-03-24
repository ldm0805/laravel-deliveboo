@extends('layouts.admin')
@section('content')
	<div class="text-white py-5">
		<div class="d-flex justify-content-between align-items-center">
			<h1>RISTORATORI</h1>
			<a href="{{route('admin.restaurateurs.create') }}" class="btn btn-success">
				<i class="fa-solid fa-square-plus fa-lg fa-fw"></i> Aggiungi un nuovo ristorante
			</a>
		</div>

		@if ($restaurateurs->isEmpty())
			no restaurateurs, click here to add one
		@else
			<div class="restaurateurs-table">
				{{-- t-head --}}
				<div class="t-head grid-container fw-bold py-4 px-3">
					<div class="grid-item">Nome</div>
					<div class="grid-item">Mail</div>
					<div class="grid-item">Indirizzo</div>
					<div class="grid-item">Controller</div>
				</div>

				{{-- t-body --}}
				<div class="t-body">
					@foreach ($restaurateurs as $item)	
						<div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
							<div class="grid-item">{{$item['name']}}</div>
							<div class="grid-item">{{$item['email']}}</div>
							<div class="grid-item">{{$item['address']}}</div>
							<div class="grid-item d-flex gap-3">
								<a href="{{ route('admin.restaurateurs.edit', $item) }}" class="text-white"><i class="fa-solid fa-pen-to-square"></i></a>
								<a href="{{ route('admin.restaurateurs.show', $item->slug) }}" class="text-white"><i class="fa-solid fa-eye"></i></a>
								<form action="{{route('admin.restaurateurs.destroy', $item->slug)}}" method="POST">
									@csrf
									@method('DELETE')
									<a class="text-white p-0 confirm-delete" data-title="{{ $item->name }}" data-title="{{ $item->title }}" data-bs-toggle="modal" data-bs-target="#delete-modal" type="submit" title="Cancella restaurateurs">
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
	@include('admin.partials.modal_delete')

@endsection