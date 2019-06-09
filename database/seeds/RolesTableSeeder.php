<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => 'USER',
                    'display_name' => 'ROLE USER',
                    'description' => 'USER ROLE',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => 'ADMIN',
                    'display_name' => 'ROLE ADMIN',
                    'description' => 'ADMIN ROLE',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => 'LECTURER',
                    'display_name' => 'ROLE LECTURER',
                    'description' => 'LECTURER ROLE',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => 'STUDENT',
                    'display_name' => 'ROLE STUDENT',
                    'description' => 'STUDENT ROLE',
                    'created_at' => Carbon::now(), # \Datetime()
                    'updated_at' => Carbon::now(),  # \Datetime()
                ),
        ));
    }
}
