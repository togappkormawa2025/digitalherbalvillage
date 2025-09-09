<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'], // cari email ini dulu
            [
                'name' => 'Super Admin',
                'password' => Hash::make('minmin12345'), // password default
            ]
        );
    }
}
