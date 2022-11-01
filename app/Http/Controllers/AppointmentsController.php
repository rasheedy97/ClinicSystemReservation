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
    public function index($user_id)
    {
           //Get appointments of a specific user id: (join with specalties table)
        $rows = Appointments::with('specialties:id,name')->where('user_id', $user_id)->get();

        $output = [];
          //Retrieve special data with foriegn relation:
        foreach ($rows as $row) {
            $output[] = [
                "start_time" => $row["start_time"],
                "speciality" => $row["specialties"]["name"]
            ];
        }

        return $output;
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
        // validation : All fields are required , start time has a particular form (Carbon) 
        $validator = Validator::make($request->all(), [

            'start_time' => 'required|date_format:Y-m-d H:i:s|after:' . Carbon::now()->format('Y-m-d H:i:s'),
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
    public function show()
    {

        // Get all appointments joined with specialties and user names to the admin.
        
        $rows = Appointments::with(['users:id,name'])->with('specialties:id,name')->get();

        $output = [];
//Retrieve special data with foriegn relation:
        foreach ($rows as $row) {
            $output[] = [
                "start_time" => $row["start_time"],
                "user" => $row["users"]["name"],
                "speciality" => $row["specialties"]["name"]
            ];
        }

        return $output;
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
