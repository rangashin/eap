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
        Kawan::create(['id' => 'AH', 'kawanname' => 'AYALA HILLSIDE']);
        Kawan::create(['id' => 'AV', 'kawanname' => 'ALPHA VILLAGE']);
        Kawan::create(['id' => 'C', 'kawanname' => 'CENTRO']);
        Kawan::create(['id' => 'CG', 'kawanname' => 'CH GOLF']);
        Kawan::create(['id' => 'DM', 'kawanname' => 'DIVINE MERCY']);
        Kawan::create(['id' => 'OLL-S', 'kawanname' => 'OUR LADY OF LOURDES - SOFIA']);
        Kawan::create(['id' => 'SG', 'kawanname' => 'SITIO GABIHAN']);
        Kawan::create(['id' => 'SK', 'kawanname' => 'SAPANG KANGKONG']);
        Kawan::create(['id' => 'SN', 'kawanname' => 'STO. NIÑO']);
        Kawan::create(['id' => 'SP', 'kawanname' => 'SITIO PAYONG']);
        Kawan::create(['id' => 'STCJ-H', 'kawanname' => 'ST. THERESE OF THE CHILD JESUS - HOBART']);
        Kawan::create(['id' => 'VH', 'kawanname' => 'VISAYAN HILLS']);
    }
}
