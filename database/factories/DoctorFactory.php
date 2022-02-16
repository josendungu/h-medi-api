<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $gender = $this->faker->randomElement(['male', 'female']);
        $filePath = storage_path('doctor-images');
        $doctor_url = '';

        if ($gender == 'male'){
            $number = $this->faker->numberBetween(2,4);
            $doctor_url = 'doctor'.$number.'png';
        } else {
            $doctor_url = 'doctor1.png';
        }

        return [
            'first_name' => $this->faker->firstName($gender),
            'last_name' => $this->faker->lastName($gender),
            "gender" => $gender,
            'phone_number' => $this->faker->phoneNumber(),          
            'rating' => $this->faker->numberBetween(3,5),
            'about' => $this->faker->realText(),
            'email' => $this->faker->safeEmail(),
            'image_url' => "storage/doctor-images/$doctor_url",
            'specialist_id' => $this->faker->numberBetween(1,8)

        ];
    }
}
