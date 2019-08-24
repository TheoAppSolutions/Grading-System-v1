<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([[
            'role_description' => "Admin",
            'color_template' => "info",
        ], [
            'role_description' => "Principal",
            'color_template' => "primary",
        ], [
            'role_description' => "Office",
            'color_template' => "info",
        ], [
            'role_description' => "Homeroom",
            'color_template' => "warning",
        ], [
            'role_description' => "Teacher",
            'color_template' => "success",
        ], [
            'role_description' => "Registrar",
            'color_template' => "danger",
        ], [
            'role_description' => "Secretary",
            'color_template' => "warning",
        ]]);
    }
}
