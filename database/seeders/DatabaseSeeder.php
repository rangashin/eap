<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            KawanSeeder::class,
        ]);

        User::create([
            'role_id' => Role::IS_SECRETARY,
            'username' => 'bjbjbjbj',
            'email' => 'bj@bjbj.com',
            'contactno' => '09142412312',
            'password' => bcrypt('billie20'),
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
