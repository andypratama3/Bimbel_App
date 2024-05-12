<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'password' => bcrypt('admin1211'),
            'role' => 1,
            'slug' => 'admin-'.Str::random(10),
        ];

        $user = \App\Models\User::create($userData);
    }
}
