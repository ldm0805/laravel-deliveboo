@extends('layouts.admin')
@section('content')
	<div class="text-white py-5">
		<h1>RISTORATORI</h1>

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
								<a href="#" class="text-white"><i class="fa-solid fa-dumpster-fire"></i></a>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection