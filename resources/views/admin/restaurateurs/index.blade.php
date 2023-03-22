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
								<div><i class="fa-solid fa-eye"></i></div>
								<div><i class="fa-solid fa-pen"></i></div>
								<div><i class="fa-solid fa-dumpster-fire"></i></div>
							</div>
						</div>
						@endforeach
					</div>
				
			</div>
			{{-- <table class="table px-4 table-borderless restaurateurs-table">
				<thead class="text-white">
					<th>Nome</th>
					<th>Mail</th>
					<th>Indirizzo</th>
					<th>Controllers</th>
				</thead>
				<tbody class="text-white">
					@foreach (as $item)
						<tr class="align-middle">
							<td>{{$item['name']}}</td>
							<td>{{$item['email']}}</td>
							<td>{{$item['address']}}</td>
							<td>
								<div class="button btn btn-primary"><i class="fa-solid fa-eye"></i></div>
								<div class="button btn btn-primary"><i class="fa-solid fa-pen"></i></div>
								<div class="button btn btn-primary"><i class="fa-solid fa-dumpster-fire"></i></div>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table> --}}
		@endif
	</div>
@endsection