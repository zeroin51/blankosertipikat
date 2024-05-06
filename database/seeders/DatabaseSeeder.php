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

        DB::table('tim')->insert([
            'namaTim' => 'TIM 1',
        ]);

        DB::table('tim')->insert([
            'namaTim' => 'TIM 2',
        ]);

        DB::table('tim')->insert([
            'namaTim' => 'TIM 3',
        ]);

        DB::table('tim')->insert([
            'namaTim' => 'TIM 4',
        ]);

        DB::table('tim')->insert([
            'namaTim' => 'TIM 5',
        ]);

        DB::table('tim')->insert([
            'namaTim' => 'Rutin',
        ]);

        DB::table('tim')->insert([
            'namaTim' => 'Lintor',
        ]);
    }
}
