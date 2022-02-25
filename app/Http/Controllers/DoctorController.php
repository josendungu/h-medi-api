<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Specialist;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctors = Doctor::all();

        $doctors_details = array();


        foreach($doctors as $doctor) {
            $doctor_detail = array(
                "about" => $doctor->about,
                "id" => $doctor->id,
                "first_name" => $doctor->first_name,
                "last_name" => $doctor->last_name,
                "email" => $doctor->email,
                "phone_number" => $doctor->phone_number,
                "image_url" => $doctor->image_url,
                "specialist" => Specialist::find($doctor->specialist_id),
                "rating" => $doctor->rating,
                "gender" => $doctor->gender
            );


            array_push($doctors_details, $doctor_detail);
        }

        
        return $doctors_details;
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $doctor = Doctor::find($id);
        $doctor_detail = array(
            "about" => $doctor->about,
            "id" => $doctor->id,
            "first_name" => $doctor->first_name,
            "last_name" => $doctor->last_name,
            "email" => $doctor->email,
            "phone_number" => $doctor->phone_number,
            "image_url" => $doctor->image_url,
            "specialist" => Specialist::find($doctor->specialist_id),
            "rating" => $doctor->rating,
            "gender" => $doctor->gender

        );
        return $doctor_detail;
    }

   
    /**
     * Display a listing of the resource.
     *
     * @param  int  $specialist_id
     * @return \Illuminate\Http\Response
     */
    public function doctorsBySpecialty($specialist_id)
    {
        $doctors = DB::table('doctors')->where('specialist_id', '=', $specialist_id)->get();
       
        $doctors_details = array();


        foreach($doctors as $doctor) {
            $doctor_detail = array(
                "about" => $doctor->about,
                "id" => $doctor->id,
                "first_name" => $doctor->first_name,
                "last_name" => $doctor->last_name,
                "email" => $doctor->email,
                "phone_number" => $doctor->phone_number,
                "image_url" => $doctor->image_url,
                "specialist" => Specialist::find($doctor->specialist_id),
                "rating" => $doctor->rating,
                "gender" => $doctor->gender

            );


            array_push($doctors_details, $doctor_detail);
        }

        
        return $doctors_details;
       
    }

    
}
