<?php

namespace Database\Seeders;

use App\Models\YearLevel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YearLevel::create(['id' => 'C', 'yearleveldescription' => 'College']);
        YearLevel::create(['id' => 'E', 'yearleveldescription' => 'Elementary']);
        YearLevel::create(['id' => 'HS', 'yearleveldescription' => 'High School']);
        YearLevel::create(['id' => 'SHS', 'yearleveldescription' => 'Senior High School']);
    }
}
