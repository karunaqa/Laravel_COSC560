<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(5)
        // ->has(Post::factory(10))
        // ->create();

            // Create Admin User
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin12@admin.com',
            'password' => Hash::make('password123'), // Set the password
            'role' => 'admin', // Assign the role
        ]);
        
        // Create Author User
        \App\Models\User::factory()->create([
            'name' => 'Author User',
            'email' => 'author12@author.com',
            'password' => Hash::make('password123'), // Set the password
            'role' => 'author', // Assign the role
        ]);
        
        // Create Regular User
        \App\Models\User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user12@user.com',
            'password' => Hash::make('password123'), // Set the password
            'role' => 'user', // Assign the role
        ]);
        

        // $this->call(PostSeeder::class);
    }
}
