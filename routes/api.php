<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpecialistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/doctors/specialist/{specialist_id}', [DoctorController::class, 'doctorsBySpecialty']);
Route::get('/appointments/patient/{patient_id}', [AppointmentController::class, 'patientAppointments']);

Route::resource('appointments', AppointmentController::class);
Route::resource('patients', PatientController::class);
Route::resource('specialists', SpecialistController::class);
Route::resource('doctors', DoctorController::class);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
