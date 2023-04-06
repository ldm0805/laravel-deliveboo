@extends('layouts.admin')
@section('content')

<div class="mt-4">
    <h1 class="fw-bold">Statistiche</h1>
    <canvas id="myChart"></canvas>
</div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var monthlyTotals = <?php echo json_encode($monthly_totals); ?>;

    var months = [];
    for (var month in monthlyTotals) {
        months.push(month);
    }
    months.sort();

    var monthNames = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

    var labels = months.map(function(month) {
        return monthNames[parseInt(month)-1];
    });

    var data = months.map(function(month) {
        return monthlyTotals[month];
    });

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

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
				<div class="grid-item t-head grid-container fw-bold py-4 px-3">
                    <div class="grid-item g-col-2">Cliente</div>
					<div class="grid-item g-col-2 d-none d-md-block">Indirizzo</div>
					<div class="grid-item g-col-2">Totale ordine</div>
                    <div class="grid-item g-col-2 d-none d-md-block">Data ordine</div>
					<div class="grid-item g-col-2">Telefono</div>
					<div class="grid-item g-col-2 d-none d-md-block">Mail</div>
					<div class="grid-item g-col-2 d-md-none d-block">Visualizza</div>

				</div>

				{{-- t-body --}}
				<div class="t-body">
					@foreach ($orders as $item)	
						<div class="grid-item t-row grid-container align-items-center py-3 px-3 rounded">
							<div class="grid-item g-col-2">{{$item['name']}} {{$item['surname']}}</div>
							<div class="grid-item g-col-2 d-none d-md-block">{{$item['address']}}</div>
                            <div class="grid-item g-col-2">{{$item['total']}} &euro;</div>
                            <div class="grid-item g-col-2 d-none d-md-block">{{$item['date']}}</div>
                            <div class="grid-item g-col-2">{{$item['phone']}}</div>
                            <div class="grid-item g-col-2 d-none d-md-block">{{$item['mail']}}</div>
                            <div class="grid-item g-col-2  d-md-none d-block"><a href="{{route('admin.orders.show', $item->id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></div>
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