<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
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
        return Doctor::all();
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Doctor::find($id);
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
        return $doctors;
    }

    
}
