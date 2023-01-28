<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\ApplicantStatus;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSettingsController extends Controller
{
    public function updateAcadYear(Request $request){
        $settings = AdminSettings::find(1);
        $settings->update(['academicyear' => $request->academicyear]);
        User::where('role_id', 3)->update(['role_id' => 2]);
        Applicant::query()->update([
            'interviewdate' => null,
            'hasbeenselecteddate' => null,
            'formreceived' => null,
            'issubmitted' => Applicant::IS_NOT_SUBMMITED,
            'resubmissionmessage' => null,
            'applicant_statuses_id' => ApplicantStatus::IS_NOT_YET_REGISTERED
        ]);
        Scholar::truncate();
        return redirect()->route('dashboard')->with('success', 'Academic year has been changed.');
    }

    public function submission(Request $request){
        $settings = AdminSettings::find(1);
        $settings->update([
            'applicantssubmission' => $request->applicantssubmission ?? 0,
            'scholarssubmission' => $request->scholarssubmission ?? 0,
        ]);

        return redirect()->route('dashboard')->with('success', 'Submission has been modified.');
    }
}
