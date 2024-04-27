<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'phone' => '087777711022',
            'role' => 'ADMIN',
            'password' => Hash::make('admin123'),
        ]);

        User::factory()->create([
            'name' => 'Abghi Fareihan',
            'email' => 'abghi@gmail.com',
            'phone' => '087777711022',
            'role' => 'USER',
            'password' => Hash::make('abghi123'),
        ]);

        User::factory(10)->create();
        Category::factory(3)->create();
        Product::factory(10)->create();
        Gallery::factory(20)->create();
    }
}
