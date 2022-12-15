<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['roletype' => 'New Account']);
        Role::create(['roletype' => 'Applicant']);
        Role::create(['roletype' => 'Scholar']);
        Role::create(['roletype' => 'Secretary']);
        Role::create(['roletype' => 'Leader']);
        Role::create(['roletype' => 'Priest']);
        Role::create(['roletype' => 'Adviser']);
    }
}
