<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(auth()->user()->role_id == Role::IS_NEW){
            return redirect()->route('account.edit');
        }elseif(auth()->user()->role_id == Role::IS_APPLICANT){
            return view('dashboard');
        }elseif(auth()->user()->role_id == Role::IS_SCHOLAR){
            return view('dashboard-impo');
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
}
