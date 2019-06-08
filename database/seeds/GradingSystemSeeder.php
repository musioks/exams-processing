<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class GradingSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('grading_systems')->delete();

        DB::table('grading_systems')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'A',
                    'min_score' => 70,
                    'max_score' => 100,
                    'comment' => 'Excellent',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'B',
                    'min_score' => 60,
                    'max_score' => 69,
                    'comment' => 'Good',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'C',
                    'min_score' => 50,
                    'max_score' => 59,
                    'comment' => 'Fair',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'D',
                    'min_score' => 40,
                    'max_score' => 49,
                    'comment' => 'Pass',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            4 =>
                array(
                    'id' => 5,
                    'name' => 'E',
                    'min_score' => 0,
                    'max_score' => 39,
                    'comment' => 'Fail',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),

        ));

    }
}
