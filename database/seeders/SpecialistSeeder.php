<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialists')->insert([

            [
                'specialist_name' => "General Practitioner"
            ],

            [
                'specialist_name' => "Dentist"
            ],

            [
                'specialist_name' => "Neurosurgeon"
            ],

            [
                'specialist_name' => "Psychiatrist"
            ],

            [
                'specialist_name' => "Gynecologists"
            ],

            [
                'specialist_name' => "Pediatrician"
            ],

            [
                'specialist_name' => "Cardiologist"
            ],

            [
                'specialist_name' => "Radiologist"
            ] 

        ]);
    }
}
