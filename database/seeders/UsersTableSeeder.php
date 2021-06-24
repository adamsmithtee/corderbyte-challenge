<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'admin',
            'role_id' => 1
        ]);

        User::create([
            'full_name' => 'jameson',
            'username' => 'jame',
            'email' => 'jame@example.com',
            'password' => 'password',
            'role_id' => 2
        ]);
        User::create([
            'full_name' => 'brown',
            'username' => 'brown',
            'email' => 'brown@example.com',
            'password' => 'password',
            'role_id' => 3
        ]);
    }
}
