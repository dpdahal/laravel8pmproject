<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{

    public function run()
    {
        $usersData = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin002'),
                'role' => 'admin',
                'gender' => 'male'
            ],
            [
                'name' => 'sita',
                'username' => 'sita',
                'email' => 'sita@gmail.com',
                'password' => bcrypt('user002'),
                'role' => "user",
                'gender' => 'female'
            ]
        ];

        foreach ($usersData as $user) {
            User::create($user);
        }

    }
}
