<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\AdminProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit(){
        if(auth()->user()->role_id == Role::IS_NEW){
            return view('profile.user-profile-new');
        // }elseif(auth()->user()->role_id == Role::IS_APPLICANT){
        }elseif(in_array(auth()->user()->role_id, [Role::IS_APPLICANT, Role::IS_SCHOLAR])){
            $user = UserProfile::find(auth()->user()->id);
            return view('profile.user-profile', compact('user'));
        }elseif(auth()->user()->role_id == Role::IS_LEADER){
            if(AdminProfile::where('user_id', auth()->user()->id)->exists()) {
                $user = AdminProfile::find(auth()->user()->id);
                return view('profile.kawan-profile', compact('user'));
            }
            return view('profile.kawan-profile-new');
        }elseif(in_array(auth()->user()->role_id, [Role::IS_ADVISER, Role::IS_PRIEST])){
            if(AdminProfile::where('user_id', auth()->user()->id)->exists()) {
                $user = AdminProfile::find(auth()->user()->id);
                return view('profile.subadmin-profile', compact('user'));
            }
            return view('profile.subadmin-profile-new');
        }
    }

    public function update(Request $request){
        if(in_array(auth()->user()->role_id, [Role::IS_NEW, Role::IS_APPLICANT, Role::IS_SCHOLAR])){
            $request->validate([
                'fullname' => ['min:8', 'string', 'required', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
                'address' => ['string', 'required', 'regex:/^[#.0-9a-zA-Z\s,-]+$/'],
                'birthdate' => ['date', 'before_or_equal:14 years ago'],
                'acctype' => ['required'],
            ]);

            UserProfile::updateOrCreate([
                'user_id' => auth()->user()->id
            ],[
                'fullname' => strtoupper($request->fullname),
                'address' => strtoupper($request->address),
                'birthdate' => $request->birthdate,
                'acctype' => strtoupper($request->acctype),
            ]);

            if(auth()->user()->role_id == Role::IS_NEW){
                User::find(auth()->user()->id)->update(['role_id' => Role::IS_APPLICANT]);
                return redirect()->route('account.edit')->with('success', 'Profile Information Has Been Created.');
            }
            return redirect()->route('account.edit')->with('success', 'Profile Information Has Been Updated.');
        }elseif(auth()->user()->role_id == Role::IS_LEADER){
            $request->validate([
                'kawan_id' => ['required'],
                'leaderfullname' => ['min:8', 'string', 'required', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
                'leaderaddress' => ['min:8', 'string', 'required', 'regex:/^[#.0-9a-zA-Z\s,-]+$/'],
                'leaderbirthdate' => ['date', 'before_or_equal:14 years ago'],
                'leadersex' => ['required'],
            ]);

            $userExist = AdminProfile::where('user_id', auth()->user()->id)->exists();

            AdminProfile::updateOrCreate([
                'user_id' => auth()->user()->id
            ],[
                'kawan_id' => $request->kawan_id,
                'adminfullname' => strtoupper($request->leaderfullname),
                'adminaddress' => strtoupper($request->leaderaddress),
                'adminbirthdate' => $request->leaderbirthdate,
                'sex' => strtoupper($request->leadersex),
            ]);
            
            if(!$userExist){
                return redirect()->route('account.edit')->with('success', 'Profile Information Has Been Created.');
            }
            return redirect()->route('account.edit')->with('success', 'Profile Information Has Been Updated.');
        }elseif(in_array(auth()->user()->role_id, [Role::IS_ADVISER, Role::IS_PRIEST])){
            $request->validate([
                'subadminfullname' => ['min:8', 'string', 'required', 'regex:/^[\w-]{2,}(\s([\w-]{2,}|[\w]{1}.))+$/'],
                'subadminaddress' => ['min:8', 'string', 'required', 'regex:/^[#.0-9a-zA-Z\s,-]+$/'],
                'subadminbirthdate' => ['date', 'before_or_equal:21 years ago'],
            ]);

            $userExist = AdminProfile::where('user_id', auth()->user()->id)->exists();

            AdminProfile::updateOrCreate([
                'user_id' => auth()->user()->id
            ],[
                'adminfullname' => strtoupper($request->subadminfullname),
                'adminaddress' => strtoupper($request->subadminaddress),
                'adminbirthdate' => $request->subadminbirthdate,
            ]);

            if(!$userExist){
                return redirect()->route('account.edit')->with('success', 'Profile Information Has Been Created.');
            }
            return redirect()->route('account.edit')->with('success', 'Profile Information Has Been Updated.');
        }
    }
}
