<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //Find specific id:

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(Request $request)
    {
        //TODO : Add validation
        $validator = Validator::make($request->all(), [

            'start_time' => 'required|date_format:Y-m-d H:i:s|after:'.Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => 'required',
            'specialty_id' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json($validator->errors(), 400);

        }

        //Store new appointment in appointment table :
        $newappointment = new Appointments;
        $newappointment->user_id = request('user_id');
        $newappointment->specialty_id = request('specialty_id');
        $newappointment->start_time = request('start_time');

        $newappointment->save();
        return response()->json([
            '2' => 'Your information stored successfuly!',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function show($day)
    {
        //
        $date = date('Y-m-d', strtotime($day));
        return Appointments::whereDate('start_time', $date)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointments $appointments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointments $appointments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointments $appointments)
    {
        //
    }
}
