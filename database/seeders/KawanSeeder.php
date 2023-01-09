<?php

namespace Database\Seeders;

use App\Models\Kawan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kawan::create(['id' => 'AH', 'kawanname' => 'Ayala Hillside']);
        Kawan::create(['id' => 'AV', 'kawanname' => 'Alpha Village']);
        Kawan::create(['id' => 'C', 'kawanname' => 'Centro']);
        Kawan::create(['id' => 'CG', 'kawanname' => 'CH Golf ']);
        Kawan::create(['id' => 'DM', 'kawanname' => 'Divine Mercy']);
        Kawan::create(['id' => 'OLL-S', 'kawanname' => 'Our Lady of Lourdes - Sofia']);
        Kawan::create(['id' => 'SG', 'kawanname' => 'Sitio Gabihan']);
        Kawan::create(['id' => 'SK', 'kawanname' => 'Sapang Kangkong']);
        Kawan::create(['id' => 'SN', 'kawanname' => 'Sto. Niño']);
        Kawan::create(['id' => 'SP', 'kawanname' => 'Sitio Payong']);
        Kawan::create(['id' => 'STCJ-H', 'kawanname' => 'St. Therese of the Child Jesus - Hobart']);
        Kawan::create(['id' => 'VH', 'kawanname' => 'Visayan Hills']);
    }
}
