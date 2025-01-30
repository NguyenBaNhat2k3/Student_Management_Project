<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;


class TableCourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $teacherIds = DB::table('teachers')->pluck('teacher_id')->toArray();
        // Create 10 courses
        for ($i = 0; $i < 10; $i++) {
            \App\Models\Course::create([
                'course_name' => $faker->name,
                'description' => $faker->paragraph(3),
                'credits' => $faker->randomNumber(1,20),
                'teacher_id' => $teacherIds[array_rand($teacherIds)], // Chọn ngẫu nhiên teacher_id
            ]);
        }
    }
}
