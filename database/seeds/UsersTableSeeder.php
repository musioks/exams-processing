<?php

use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([

                'name' => 'Administrator',
                'email' => 'admin@school.com',
                'password' => bcrypt('123456'),
                'admin' => 1,
                'is_activated' => 1,
                'created_at' => Carbon::now(), # \Datetime()
                'updated_at' => Carbon::now(),  # \Datetime()
           ]);
        $admin = Role::where('name', 'ADMIN')->first();
        $role_user = Role::where('name', 'USER')->first();
        $user->attachRoles([$admin->id, $role_user->id]);
    }
}
