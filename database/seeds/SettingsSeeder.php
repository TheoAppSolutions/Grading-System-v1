<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([[
            'field_name' => "default_password",
            'field_value' => "654321",
        ],[
            'field_name' => "login_enabled",
            'field_value' => "1",
        ],[
            'field_name' => "report_enabled",
            'field_value' => "1",
        ],[
            'field_name' => "email_enabled",
            'field_value' => "1",
        ],[
            'field_name' => "file_storage_enabled",
            'field_value' => "0",
        ]]);
    }
}
