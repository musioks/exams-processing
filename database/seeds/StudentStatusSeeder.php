<?php

use App\Students\Student_status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class StudentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student_status::insert([
            [
                'name' => 'Approved',
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
            [
                'name' => 'Rejected',
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
        ]);
    }
}
