<?php

namespace Database\Seeders;

use App\Models\Ministry;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ministry::create(['id' => 'Choir', 'ministryname' => 'Liturgical Music Ministry']);
        Ministry::create(['id' => 'FOG', 'ministryname' => 'Family of God Ministry']);
        Ministry::create(['id' => 'L&C', 'ministryname' => 'Lector and Commentator Ministry']);
        Ministry::create(['id' => 'PCCVA', 'ministryname' => 'Pastoral Care for Children and Vulnerable Adults Ministry']);
        Ministry::create(['id' => 'Sacristan', 'ministryname' => 'Altar Server Ministry']);
        Ministry::create(['id' => 'SocComm', 'ministryname' => 'Social Communications Ministry']);
        Ministry::create(['id' => 'YFC', 'ministryname' => 'Youth for Christ Ministry']);
    }
}
