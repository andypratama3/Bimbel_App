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
        $userData1 = [
            'id' => Str::uuid(),
            'name' => 'Admin',
            'email' => 'admin1@localhost.com',
            'password' => bcrypt('admin1211'),
            'role' => 1,
            'slug' => 'admin1-'.Str::random(10),
        ];

        $user1 = \App\Models\User::create($userData1);

        $userData2 = [
            'id' => Str::uuid(),
            'name' => 'Orang Tua',
            'email' => 'orangtua@gmail.com',
            'password' => bcrypt('orangtua'),
            'role' => 0,
            'slug' => 'orangtua-'.Str::random(10),
        ];

        $user2 = \App\Models\User::create($userData2);
    }
}
