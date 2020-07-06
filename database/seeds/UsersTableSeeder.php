<?php

use App\User;
use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'role'           => 'admin',
                'username'       => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('rahasia'),
                'remember_token' => null,
                'created_at'     => '2019-09-19 12:08:28',
                'updated_at'     => '2019-09-19 12:08:28',
            ],
        ];

        User::insert($users);
    }
}
