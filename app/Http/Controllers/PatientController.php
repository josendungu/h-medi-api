<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $password = $request->input('password');
        $hashed_password = Hash::make($password);

        return Patient::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'gender' => $request->input('gender'),
            'password' => $hashed_password,
        ]);
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

        if ($request->has('password')) {
           
            $password = $request->input('password');
            $hashed_password = Hash::make($password);

            $request->merge(['password' => $hashed_password]);
        }

        $patient = Patient::find($id);
        $patient->update($request->all());

        return $patient;
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function loginPatient(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $password = $request->input('password');

        if (DB::table('patients')->where('phone_number', '=', $phone_number)->exists()){

            $patient = DB::table('patients')->where('phone_number', '=', $phone_number)->first();

            if(Hash::check($password, $patient->password)) {
    
                return response()->json([
                    'success' => true,
                    'errorMessage' => '',
                    'patient' => $patient
                ]);
    
            } else {
    
                return response()->json([
                    'success' => false,
                    'errorMessage' => 'You have entered the wrong password.',
                    'patient' => null
                ]);
    
            }

        } else {

            return response()->json([
                'success' => false,
                'errorMessage' => 'No account with that phone number exists.',
                'patient' => null
            ]);

        }

        
    }

   
}
