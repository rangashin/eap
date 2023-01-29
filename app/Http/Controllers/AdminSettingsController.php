<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use App\Models\ApplicantStatus;
use App\Notifications\RegistrationOpeningNotification;
use App\Notifications\SubmissionOpeningNotification;
use Illuminate\Support\Facades\Notification;

class AdminSettingsController extends Controller
{
    public function updateAcadYear(Request $request){
        $settings = AdminSettings::find(1);
        $settings->update(['academicyear' => $request->academicyear]);
        User::where('role_id', Role::IS_SCHOLAR)->update(['role_id' => Role::IS_APPLICANT]);
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

        if($settings->applicantssubmission == 1 && $request->applicantssubmission == 1){
        }elseif(empty($request->applicantssubmission)){
        }else{
            $users = User::where('role_id', Role::IS_APPLICANT)->get();
            Notification::send($users, new RegistrationOpeningNotification());
        }

        if($settings->scholarssubmission == 1 && $request->scholarssubmission == 1){
        }elseif(empty($request->scholarssubmission)){
        }else{
            $users = User::where('role_id', Role::IS_SCHOLAR)->get();
            Notification::send($users, new SubmissionOpeningNotification());
        }
        
        $settings->update([
            'applicantssubmission' => $request->applicantssubmission ?? 0,
            'scholarssubmission' => $request->scholarssubmission ?? 0,
        ]);

        

        return redirect()->route('dashboard')->with('success', 'Submission has been modified.');
    }
}
