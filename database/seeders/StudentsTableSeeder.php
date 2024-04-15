<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            DB::table('students')->insert([
                'lrn' => $faker->unique()->numerify('##########'),
                'password' => bcrypt('password'), 
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'middlename' => $faker->firstName,
                'sex' => $faker->randomElement(['Male', 'Female']),
                'strand_id' => $faker->numberBetween(1, 8), 
                'grade_level_id' => $faker->numberBetween(11, 12), 
                'school_year_id' => $faker->numberBetween(6), 
                'place_birth' => $faker->city,
                'date_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'email' => $faker->unique()->safeEmail,
                'street' => $faker->streetName,
                'brgy' => $faker->streetSuffix,
                'city' => $faker->city,
                'semester_id' => $faker->numberBetween(12), 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
