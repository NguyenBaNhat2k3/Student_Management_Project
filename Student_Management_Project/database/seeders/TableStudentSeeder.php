<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class TableStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $students = [];
        for ($i = 0; $i < 10; $i++) {
            Student::create([
                'full_name' => $faker->name,
                'date_of_birth' => $faker->date(),
                'email' => $faker->email,
                'phone_number' => $faker->phoneNumber(),
            ]);
        }
        
    }
}
