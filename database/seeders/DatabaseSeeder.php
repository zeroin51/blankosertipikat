<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Insert user data without using factory
        DB::table('users')->insert([
            'namaUser' => 'admin',
            'password' => Hash::make('admin123'),
            'email' => 'admin@admin.com',
            'idTim' => 10, // Ubah sesuai kebutuhan
        ]);
    }
}
