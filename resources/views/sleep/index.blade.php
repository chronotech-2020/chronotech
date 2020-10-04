@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Sleep</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <canvas id="temperatureChart" class="p-3"></canvas>
                    <div class="m-3">
                        <div class="float-center">
                            <div class="pl-5 pr-5 text-center">
                                <p> Recent Sleep Time: {{ date('h:i:s A', strtotime($sleepTimeForTheDay->sleep_time)) ?? 'N/A' }} </p>
                                <p> Recent Wake Time: {{ date('h:i:s A', strtotime($sleepTimeForTheDay->wake_time)) ?? 'N/A' }} </p>
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#sleepAndWakeUpTimeModal">Update Sleep and Wake Time</button>
                            </div>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="text-center">
                            <h4 class="p-3"> Caffeine Breaks </h4>
                            <div class="pl-5 pr-5">
                                @if (!empty($caffeineIntakeForTheDay[0]))
                                    @foreach($caffeineIntakeForTheDay as $caffeineIntake)
                                        <p> {{ date('h:i:s A', strtotime($caffeineIntake->time_start)) }} - {{ date('h:i:s A', strtotime($caffeineIntake->time_end)) }}</p>
                                    @endforeach
                                @else 
                                    <p class="text-center">No Caffeine Breaks yet.</p>
                                @endif
                            </div>
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#caffeinebreakModal">Add a new Caffeine Break</button>
                        </div>
                    </div>

                    <div class="m-3">
                        <div class="float-center">
                            <h4 class="text-center p-3"> Flights </h4>
                            <div class="pl-5 pr-5 text-center">
                                @if (isset($recentFlightRecord))
                                    <p> Flight:  {{ date('h:i:s A', strtotime($recentFlightRecord->flight_start_time)) }} </p>
                                    <p> Landing: {{ date('h:i:s A', strtotime($recentFlightRecord->flight_end_time)) }} </p>
                                @else
                                    <p> Flight: N/A </p>
                                    <p> Landing: N/A </p>
                                @endif
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#flightrecordModal">Schedule a new Flight</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('sleep.modal.update-sleep-time')
@include('sleep.modal.caffeine-break')
@include('sleep.modal.flight-record')

<script>
var data = @json($temperatureReadingForTheDay);

var ctx = document.getElementById('temperatureChart').getContext('2d');

var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['0','1', '2', '3', '4', '5', '6', '7','8', '9', '10', '11', '12', '13', '14','15', '16', '17', '18', '19','20', '21', '22', '23'],
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
