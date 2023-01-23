<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AdminSettings;
use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\YearLevel;
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
            MinistrySeeder::class,
            ApplicantStatusSeeder::class,
            ScholarStatusSeeder::class,
            YearLevelSeeder::class,
        ]);

        User::create([
            'role_id' => Role::IS_SECRETARY,
            'username' => 'bjbjbjbj',
            'email' => 'bj@bjbj.com',
            'contactno' => '09142412312',
            'password' => bcrypt('billie20'),
        ]);

        User::create([
            'role_id' => Role::IS_APPLICANT,
            'username' => 'billiejoe',
            'email' => 'bjbj@bjbj.com',
            'contactno' => '09134321173',
            'password' => bcrypt('billie20'),
        ]);

        User::create([
            'role_id' => Role::IS_APPLICANT,
            'username' => 'jbjbjbjb',
            'email' => 'jb@jbjb.com',
            'contactno' => '09134653533',
            'password' => bcrypt('billie20'),
        ]);

        UserProfile::create([
            'user_id' => 2,
            'fullname' => 'BILLIE JOE NOB',
            'address' => 'QUEZON CITY, PHILIPPINES',
            'birthdate' => '2001-02-20',
            'acctype' => 'STUDENT',
        ]);

        UserProfile::create([
            'user_id' => 3,
            'fullname' => 'BUSTIN JIEBER',
            'address' => 'QUEZON CITY, PHILIPPINES',
            'birthdate' => '2001-02-21',
            'acctype' => 'STUDENT',
        ]);

        AdminSettings::create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
