<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator'
        ]);
        Role::create([
            'name' => 'Photographer',
            'description' => 'Company photographers'
        ]);
        Role::create([
            'name' => 'User',
            'description' => 'product owners'
        ]);
    }
}
