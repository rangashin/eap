<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\AdminSettings;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id == Role::IS_NEW){
            return redirect()->route('account.edit');
        }elseif(auth()->user()->role_id == Role::IS_APPLICANT){
            $settings = AdminSettings::find(1);
            if($settings->applicantssubmission == 1){
                $applicantExists = Applicant::where('user_id', auth()->user()->id)->exists();
                if($applicantExists){
                    $applicant = Applicant::find(auth()->user()->id);
                    return view('applicant.dashboard', compact('applicant'));
                }else{
                    return view('applicant.dashboard-new');
                }
            }else{
                return view('applicant.dashboard-off-registration');
            }
        }elseif(auth()->user()->role_id == Role::IS_SCHOLAR){
            $scholar = Scholar::find(auth()->user()->id);
            return view('scholar.dashboard', compact('scholar'));
        }elseif(auth()->user()->role_id == Role::IS_SECRETARY){
            $users = User::count();
            $kawans = User::where('role_id', Role::IS_LEADER)->count();
            $applicants = Applicant::count();
            $scholars = Scholar::count();
            $settings = AdminSettings::find(1);
            return view('admin.dashboard', compact('settings', 'users', 'kawans', 'applicants', 'scholars'));
            // return redirect()->route('admin.user.index');
        }elseif(auth()->user()->role_id == Role::IS_LEADER){
            return redirect()->route('account.edit');
        }
        // }elseif(auth()->user()->role_id == Role::IS_ADVISER){
        //     return redirect()->route('account.edit');
        // }elseif(auth()->user()->role_id == Role::IS_PRIEST){
        //     return redirect()->route('account.edit');
        // }
    }
    
}
