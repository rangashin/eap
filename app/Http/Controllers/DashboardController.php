<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id == Role::IS_NEW){
            return redirect()->route('account.edit');
        }elseif(auth()->user()->role_id == Role::IS_APPLICANT){
            $applicantExists = Applicant::where('user_id', auth()->user()->id)->exists();
            if($applicantExists){
                $applicant = Applicant::find(auth()->user()->id);
                return view('applicant.dashboard', compact('applicant'));
            }else{
                return view('applicant.dashboard-new');
            }
            
        }elseif(auth()->user()->role_id == Role::IS_SCHOLAR){
            return view('dashboard');
        }elseif(auth()->user()->role_id == Role::IS_SECRETARY){
            return redirect()->route('admin.user.index');
        }elseif(auth()->user()->role_id == Role::IS_LEADER){
            return redirect()->route('account.edit');
        }elseif(auth()->user()->role_id == Role::IS_ADVISER){
            return redirect()->route('account.edit');
        }elseif(auth()->user()->role_id == Role::IS_PRIEST){
            return redirect()->route('account.edit');
        }
    }
    
    // public function store(Request $request){
    //     // dd(count($request->sample1));
    //     // dd($request->all());
    //     $request->validate([
    //         'applicantfirstname' => 'required',
    //         'applicantmiddlename' => 'required',
    //         'applicantlastname' => 'required',
    //         'applicantsuffix' => 'required',
    //         'relativename.*' => ['required_with:relativeage.*,relativerelation.*,relativework.*', 'nullable', 'string', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
    //         'relativeage.*' => ['required_with:relativename.*', 'nullable', 'integer', 'max:100'],
    //         'relativerelation.*' => 'required_with:relativename.*|nullable|string',
    //         'relativework.*' => 'required_with:relativename.*|nullable|string',
    //         'schooladdress' => 'required',
    //     ]);
        
    // }
}
