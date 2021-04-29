<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('AdminUser'),
                'remember_token' => Str::random(10),
                'role_id' => Role::getAdmin()->first()->id
            ]
        ];

        User::insert($users);
    }
}
