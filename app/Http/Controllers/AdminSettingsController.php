<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminSettings;
use RealRashid\SweetAlert\Facades\Alert;
class AdminSettingsController extends Controller
{
    public function updateAcadYear(Request $request){
        $settings = AdminSettings::find(1);
        $settings->update(['academicyear' => $request->academicyear]);
        
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
