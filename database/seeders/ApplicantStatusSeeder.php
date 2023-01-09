<?php

namespace Database\Seeders;

use App\Models\ApplicantStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ApplicantStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ApplicantStatus::create(['status' => 'Under Review']);
        ApplicantStatus::create(['status' => 'Need Resubmission']);

        //FOR UNDER REVIEWED INFO
        ApplicantStatus::create(['status' => 'Selected for Interview']);
        ApplicantStatus::create(['status' => 'Rejected']);
        ApplicantStatus::create(['status' => 'Admitted']);

        //FOR RENEWAL
        ApplicantStatus::create(['status' => 'Not yet registered']);
        ApplicantStatus::create(['status' => 'Waiting for Interview']);
    }
}
