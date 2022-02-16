<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $appointment = Appointment::create($request->all());
        $doctor = Doctor::find($appointment->doctor_id);

        $appointment_detail = array(
            'date' => $appointment->date,
            'time' => $appointment->time,
            'doctor' => $doctor,
            'id' => $appointment->id
        );

        return $appointment_detail;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $appointment = Appointment::find($id);
        $doctor = Doctor::find($appointment->doctor_id);

        $appointment_detail = array(
            'date' => $appointment->date,
            'time' => $appointment->time,
            'doctor' => $doctor,
            'id' => $appointment->id
        );

        return $appointment_detail;
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $patient_id
     * @return \Illuminate\Http\Response
     */
    public function patientAppointments($patient_id)
    {
        $appointments = DB::table('appointments')->where('patient_id', '=', $patient_id)->where('date', '>=' , strtotime(date("Y/m/d")))->get();

        $appointments_details = array();

        foreach($appointments as $appointment) {

            $doctor = Doctor::find($appointment->doctor_id);

            $appointment_detail = array(
                'date' => $appointment->date,
                'time' => $appointment->time,
                'doctor' => $doctor,
                'id' => $appointment->id
            );

            array_push($appointments_details, $appointment_detail);

        }


        return $appointments_details;
        
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
        $appointment = Appointment::find($id);
        return $appointment->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Appointment::destroy($id);
    }
}
