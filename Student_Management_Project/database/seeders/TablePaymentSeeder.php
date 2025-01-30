<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use App\Models\Payment;

class TablePaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $studentIds = DB::table('students')->pluck('student_id')->toArray();

        // Create 1000 payments
        for ($i = 0; $i < 10; $i++) {
            Payment::create([
                'student_id' =>  $studentIds[array_rand($studentIds)],
                'amount' => $faker->randomFloat(2, 1, 1000),
                'payment_date' => $faker->dateTimeBetween('-30 days', 'now'),
                'payment_method' => $faker->randomElement(['credit_card','cash','bank_tranfer']),
            ]);

        }
    }
}
