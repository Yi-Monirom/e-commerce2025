<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        create_roles_table::insert([
            ['name' => 'admin'],
            ['name' => 'manager'],
            ['name' => 'staff'],
        ]);
    }
}
