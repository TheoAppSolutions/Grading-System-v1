<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'lastname' => "ADMIN",
            'firstname' => "",
            'middlename' => "",
            'title' => "Mr.",
            'password' => bcrypt('1133')
        ]);

        DB::table('users_info')->insert([
            'user_id' => 1,
            'email' => 'admin@update.me'
        ]);

        DB::table('users_roles')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
    }
}
