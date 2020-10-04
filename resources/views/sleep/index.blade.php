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
                    
                    @php
                        //TODO: Make this more dynamic!
                        $lionWake = [5, 6];
                        $lionSleep = 22;
                        $bearWake = 7;
                        $bearSleep = 23;
                        $wolfWake = [7,8];
                        $wolfSleep = 0;
                        $lionCoffee = [8,9,10];
                        $lionCoffeeAfternoon = [14,15,16];
                        $bearCoffee = [10,11,14,15];
                        $wolfCoffee = [12,13,14];

                        if (isset($sleepTimeForTheDay)){
                            $sleepHour = date('h', strtotime($sleepTimeForTheDay->sleep_time));
                            $wakeHour = date('h', strtotime($sleepTimeForTheDay->wake_time));
                        }
                    @endphp
                    
                    @if (isset($sleepHour) && isset($wakeHour))
                        @if (auth()->user()->chronotype == 'Lion' && !($sleepHour == $lionSleep && $wakeHour <= reset($lionWake) && $wakeHour >= end($lionWake)))
                            <div class="alert alert-warning" role="alert">
                                You haven't been sleeping according to your chronotype. People with the Lion chronotype often sleep on 10PM until 5AM - 6AM.
                            </div>
                        @elseif (auth()->user()->chronotype == 'Bear' && $sleepHour != $bearSleep && $wakeHour != $bearSleep)
                            <div class="alert alert-warning" role="alert">
                                You haven't been sleeping according to your chronotype. People with the Bear chronotype often sleep on 11PM until 7PM.
                            </div>
                        @elseif (auth()->user()->chronotype == 'Wolf' && !($sleepHour == $wolfSleep && $wakeHour <= reset($wolfWake) && $wakeHour >= end($wolfWake)))
                            <div class="alert alert-warning" role="alert">
                                You haven't been sleeping according to your chronotype. People with the Wolf chronotype often sleep on 12AM until 7AM - 8AM.
                            </div>
                        @endif
                    @endif

                    <canvas id="temperatureChart" class="p-3"></canvas>
                    <div class="m-3">
                        <div class="float-center">
                            <div class="pl-5 pr-5 text-center">
                                <p> Recent Sleep Time: {{ isset($sleepTimeForTheDay->sleep_time) ? date('h:i:s A', strtotime($sleepTimeForTheDay->sleep_time)) : 'N/A' }} </p>
                                <p> Recent Wake Time: {{ isset($sleepTimeForTheDay->wake_time) ? date('h:i:s A', strtotime($sleepTimeForTheDay->wake_time)) : 'N/A' }} </p>
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
            label: 'Temperature',
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
