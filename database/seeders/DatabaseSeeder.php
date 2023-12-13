<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' => 'Administrator (Tegar)',
            'email' => 'admin_tegar@gmail.com',
            'prodi' => "Administrator",
            'password' => 'password_tegar',
            'universitas' => "Administrator",
            'tanggal_lahir' => "1000-10-10",
            'is_admin' => 1,
            'remember_token' => '0000'

        ]);

        \App\Models\User::create([
            'name' => 'Administrator (Sabian)',
            'email' => 'admin_sabian@gmail.com',
            'prodi' => "Administrator",
            'password' => 'password_sabian',
            'universitas' => "Administrator",
            'tanggal_lahir' => "1000-10-10",
            'is_admin' => 1,
            'remember_token' => '0000'

        ]);

        \App\Models\User::create([
            'name' => 'Administrator (Aldi)',
            'email' => 'admin_aldi@gmail.com',
            'prodi' => "Administrator",
            'password' => 'password_aldi',
            'universitas' => "Administrator",
            'tanggal_lahir' => "1000-10-10",
            'is_admin' => 1,
            'remember_token' => '0000'

        ]);
    }
}
