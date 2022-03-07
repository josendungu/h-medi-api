<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([

            [
                'patient_id' => 6,
                'doctor_id' => 6,
                'time'  => '7:30',
                'date' => 19086
            ],
            [
                'patient_id' => 6,
                'doctor_id' => 7,
                'time'  => '7:30',
                'date' => 19086
            ],
            [
                'patient_id' => 6,
                'doctor_id' => 7,
                'time'  => '7:30',
                'date' => 19086
            ]


        ]);
    }
}
