<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

User::updateOrCreate(
    ['email' => 'admin@iinsbouquet.com'],
    [
        'name' => "Admin Iin's Bouquet",
        'password' => Hash::make('12345678'),
    ]
);