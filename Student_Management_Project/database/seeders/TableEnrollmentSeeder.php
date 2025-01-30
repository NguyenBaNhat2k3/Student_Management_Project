<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class TableEnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $studentIds = DB::table('students')->pluck('student_id')->toArray();
        $courseIds = DB::table('courses')->pluck('course_id')->toArray();
        // Generate 1000 fake enrollments
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Enrollment::create([
                'student_id' =>  $studentIds[array_rand($studentIds)],
                'course_id' =>  $courseIds[array_rand($courseIds)],
                'enrollment_date' => $faker->date(),
                'status' => $faker->randomElement(['active','completed','dropped']),
            ]);
        }
    }
}
