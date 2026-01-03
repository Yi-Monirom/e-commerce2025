<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $admin = Role::where('name', 'admin')->first();
        $manager = Role::where('name', 'manager')->first();
        $staff = Role::where('name', 'staff')->first();

        // Admin gets everything
        $admin->permissions()->sync(Permission::all()->pluck('id'));

        // Manager permissions
        $manager->permissions()->sync(
            Permission::whereIn('name', [
                'products.create', 'products.update',
                'category.create', 'category.update'
            ])->pluck('id')
        );

        // Staff permissions
        $staff->permissions()->sync(
            Permission::whereIn('name', [
                'products.create',
                'category.create'
            ])->pluck('id')
        );
    }
}

