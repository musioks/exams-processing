<?php

use App\Academics\Semester_term;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SemesterTermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Semester_term::insert([
            [
                'name' => 'Semester 1',
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
            [
                'name' => 'Semester 2',
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
        ]);
    }
}
