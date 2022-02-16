<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                SpecialistSeeder::class,
                PatientSeeder::class,
                DoctorSeeder::class,
                AppointmentSeeder::class
            ]
        );
    }
}
