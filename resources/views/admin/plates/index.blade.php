@extends('layouts.admin')
@section('content')
	<div class="text-white py-5">
		<h1>RISTORATORI</h1>

		@if ($plates->isEmpty())
			no plates, click here to add one
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
				</div>

				{{-- t-body --}}
				<div class="t-body">
					@foreach ($plates as $item)	
						<div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
							<div class="grid-item">{{$item['name']}}</div>
							<div class="grid-item">{{$item['ingredients']}}</div>
							<div class="grid-item">{{$item['price']}}</div>
                            @if($item['visible'])
                                <div class="grid-item"><i class="fa-solid fa-check" style="color: #008000;"></i></div>
                            @else
                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                            @endif
                            @if($item['availability'])
                                <div class="grid-item"><i class="fa-solid fa-check" style="color: #008000;"></i></div>
                            @else
                                <div class="grid-item"><i class="fa-solid fa-x" style="color: #ff0000;"></i></div>
                            @endif
                            <div class="grid-item">{{$item['description']}}</div>
							<div class="grid-item d-flex gap-3">
								<a href="{{ route('admin.plates.edit', $item) }}" class="text-white"><i class="fa-solid fa-pen-to-square"></i></a>
								<a href="{{ route('admin.plates.show', $item->slug) }}" class="text-white"><i class="fa-solid fa-eye"></i></a>
								 <form class="d-inline-block" action="{{route('admin.plates.destroy', $item->slug)}}" method="POST">
									@csrf
									@method('DELETE')
									<button class="btn btn-sm text-white p-0" type="submit" title="Cancella plates">
										<i class="fa-solid fa-dumpster-fire"></i>
									</button>
								</form> 
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endif
	</div>
@endsection