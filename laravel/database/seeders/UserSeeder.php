<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = Users::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $manager = Users::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => bcrypt('password'),
        ]);

        $staff1 = Users::create([
            'name' => 'Staff One',
            'email' => 'staff1@example.com',
            'password' => bcrypt('password'),
        ]);

        $staff2 = Users::create([
            'name' => 'Staff Two',
            'email' => 'staff2@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->roles()->attach(Role::where('name', 'admin')->first());
        $manager->roles()->attach(Role::where('name', 'manager')->first());
        $staff1->roles()->attach(Role::where('name', 'staff')->first());
        $staff2->roles()->attach(Role::where('name', 'staff')->first());
    }
}

