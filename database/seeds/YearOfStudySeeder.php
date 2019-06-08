<?php

use App\Academics\Year_of_study;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class YearOfStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Year_of_study::insert([
            [
                'year_number' => 1,
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
            [
                'year_number' =>2,
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
            [
                'year_number' =>3,
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
            [
                'year_number' =>4,
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
        ]);
    }
}
