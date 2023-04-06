@extends('layouts.admin')
@section('content')

	<div class="py-5">
		<div class="d-flex justify-content-between align-items-center">
			<h1 class="fw-bold">Ordini</h1>
		</div>

		@if ($orders->isEmpty())
			<div class="d-flex align-items-center justify-content-center">
				<div class="alert border border-white text-center m-0" role="alert">
					nessun ordine!
				</div>
			</div>
		@else
			<div class="orders-table">
				{{-- t-head --}}
				<div class="t-head grid-container fw-bold py-4 px-3">
                    <div class="grid-item">Cliente</div>
					<div class="grid-item">Indirizzo</div>
					<div class="grid-item">Totale ordine</div>
                    <div class="grid-item">Data ordine</div>
					<div class="grid-item">Telefono</div>
					<div class="grid-item">Mail</div>
				</div>

				{{-- t-body --}}
				<div class="t-body">
					@foreach ($orders as $item)	
						<div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
							<div class="grid-item"><a href="{{ route('admin.restaurateurs.show', $item->slug) }}">{{$item['name']}} {{$item['surname']}}</a></div>
							<div class="grid-item">{{$item['address']}}</div>
                            <div class="grid-item">{{$item['total']}} &euro;</div>
                            <div class="grid-item">{{$item['date']}}</div>
                            <div class="grid-item">{{$item['phone']}}</div>
                            <div class="grid-item">{{$item['mail']}}</div>
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