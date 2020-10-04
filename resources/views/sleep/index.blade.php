@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sleep</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <canvas id="temperatureChart"></canvas>
                    <div class="m-3">
                        <div class="float-center">
                            <div class="pl-5 pr-5 text-center">
                                <p> Sleep Time: {{ $sleepTimeForTheDay->sleep_time ?? 'N/A' }} </p>
                                <p> Wake Time: {{ $sleepTimeForTheDay->wake_time ?? 'N/A' }} </p>
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="float-center">
                            <h4 class="text-center p-3"> Caffeine Breaks </h4>
                            <div class="pl-5 pr-5">
                                @if (!empty($caffeineIntakeForTheDay[0]))
                                    @foreach($caffeineIntakeForTheDay as $caffeineIntake)
                                        <p> {{ $caffeineIntake->time_start }} - {{ $caffeineIntake->time_end }}  </p>
                                    @endforeach
                                @else 
                                    <p class="text-center">No Caffeine Breaks yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="float-center">
                            <h4 class="text-center p-3"> Flights </h4>
                            <div class="pl-5 pr-5 text-center">
                                @if (isset($recentFlightRecord))
                                    <p> Flight:  {{ $recentFlightRecord->flight_start_time }} </p>
                                    <p> Landing: {{ $recentFlightRecord->flight_end_time }} </p>
                                @else
                                    <p> Flight: N/A </p>
                                    <p> Landing: N/A </p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var data = @json($temperatureReadingForTheDay);

var ctx = document.getElementById('temperatureChart').getContext('2d');

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['0','1', '2', '3', '4', '5', '6', '7','8', '9', '10', '11', '12', '13', '14','15', '16', '17', '18', '19','20', '21', '22', '23','24'],
        datasets: [{
            label: 'Temperature Reading for Today',
            backgroundColor: 'rgba(0, 0, 0, 0)',
            borderColor: 'rgb(255, 99, 132)',
            data: data,
            yAxisID: 'temperature',
            xAxisID: 'hours'
        }]
    },
    options: {
        scales: {
            yAxes: [
                {
                    id: "temperature",
                    scaleLabel: {
                        display: true,
                        labelString: 'Temperature (Celsius)'
                    },
                }
            ],
            xAxes: [
                {
                    id: "hours",
                    scaleLabel: {
                        display: true,
                        labelString: 'Hours'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }
            ]
        },
    }
});
</script>
@endsection
