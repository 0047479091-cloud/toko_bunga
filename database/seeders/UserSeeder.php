<?php

namespace Database\Seeders;
use App\Models\User;
use Hash:
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //buat 1 akun admin
        User::create([
            'name' => 'Admin Iin's Bouquet',
            'email' => 'admin@iinsbouquet.com',
            'password' =>Hash::make('123456789'),
        ]);
    }
}
