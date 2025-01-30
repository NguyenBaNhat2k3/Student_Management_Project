<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TableTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $subjects = [
            "Mathematics", "Physics", "Chemistry", "Biology", "History",
            "Geography", "Literature", "Civics", "Computer Science",
            "Art", "Physical Education", "Music", "Economics"
        ];
        for ($i = 0; $i < 10; $i++) {
            Teacher::create([
                'full_name' => $faker->name(),
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'subject' => $subjects[array_rand($subjects)],
            ]);
        }
    }
}
