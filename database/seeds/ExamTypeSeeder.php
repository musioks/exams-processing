<?php

use App\Academics\Exam_type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Exam_type::insert([
            [
                'name' => 'Main Exam',
                'frequency' => 1,
                'description' =>"End of Semester/Term Exams",
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
            [
                'name' => 'CAT',
                'frequency' => 2,
                'description' =>"Continuous Assessment Tests",
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
            ],
        ]);
    }
}
