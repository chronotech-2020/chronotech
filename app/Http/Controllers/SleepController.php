<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sleep;
use App\Models\Temperature;
use App\Models\CaffeineIntake;
use App\Models\Flight;

use Auth;

class SleepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temperatureReadingForTheDay = Temperature::where('user_id', Auth::user()->id)->pluck('temperature')->toArray();
        $recentFlightRecord = Flight::where('user_id', Auth::user()->id)->latest()->first();
        $caffeineIntakeForTheDay = CaffeineIntake::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        $sleepTimeForTheDay = Sleep::where('user_id', Auth::user()->id)->latest('created_at')->first();

        return view('sleep.index', compact('temperatureReadingForTheDay', 'recentFlightRecord', 'caffeineIntakeForTheDay', 'sleepTimeForTheDay'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'sleep_time' => 'required',
            'wake_time' => 'required',
        ]);

        Sleep::create([
            'user_id'  => Auth::user()->id,
            'sleep_time' => $request->sleep_time,
            'wake_time' => $request->wake_time
        ]);

        return redirect()->route('sleep.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
