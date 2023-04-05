@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center mt-5 text-center">
        <div class="col">
            @foreach ($current_user as $user)              
            <h1 class="fw-bold">Ciao {{ $user['name'] }}!</h1>
            @endforeach
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
    <div class="text-center my-4">
        <h2>Cosa vuoi fare oggi?</h2>
        <a href="{{route('admin.restaurateurs.index')}}" class="btn btn-outline-dark mt-3">Gestisci ristorante</a>
    </div>
</div>
<div class="container">
        <h1>Statistiche</h1>
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






@endsection




