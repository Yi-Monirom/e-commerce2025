<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        

        User::firstOrCreate([
            ['name' => 'Test User','password' => bcrypt('123'),],
            ['email' => 'test@example.com'],
        ]);
        {
            $this->call([
                RoleSeeder::class,
                PermissionSeeder::class,
                RolePermissionSeeder::class,
                UserSeeder::class,
            ]);
        }
    }
    // public function run()
        

}
