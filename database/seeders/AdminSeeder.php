<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    User::create([
        'name' => 'Super Admin',
        'email' => 'admin@gmail.com',
        'password' => Hash::make('Subhamay@1234'),
        'role' => 'admin',
        'is_approved' => true
    ]);
}
}
