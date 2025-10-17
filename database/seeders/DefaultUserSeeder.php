<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create default user if no users exist
        if (User::count() === 0) {
            User::create([
                'name' => 'المدير العام',
                'email' => 'admin@sokappe.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
            ]);
        }
    }
}
