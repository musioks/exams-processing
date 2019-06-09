<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AcademicYearSeeder::class);
         $this->call(YearOfStudySeeder::class);
         $this->call(SemesterTermSeeder::class);
         $this->call(ExamTypeSeeder::class);
         $this->call(GradingSystemSeeder::class);
         $this->call(StudentStatusSeeder::class);
         $this->call(RolesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
    }
}
