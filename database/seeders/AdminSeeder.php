<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@sokappe.com'],
            [
                'name' => 'مدير النظام',
                'email' => 'admin@sokappe.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin/1234'),
                'is_admin' => true,
                'phone' => '01000000000',
                'address' => 'مصر',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
