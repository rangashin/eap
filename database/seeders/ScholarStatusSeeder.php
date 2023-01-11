<?php

namespace Database\Seeders;

use App\Models\ScholarStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScholarStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScholarStatus::create(['id' => 'R', 'status' => 'Regular']);
        ScholarStatus::create(['id' => 'C', 'status' => 'Conditional']);
        ScholarStatus::create(['id' => 'I', 'status' => 'Incomplete']);
    }
}
