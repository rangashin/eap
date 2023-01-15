<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Http\Request;

class ManageScholarController extends Controller
{
    public function index(){
        $scholars = User::where('role_id', Role::IS_SCHOLAR)->with(['applicant' => function($query){
            $query->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc')->with(['kawan', 'scholar' => function($query){
                $query->with('scholarStatus');
            }]);
        }, 'role'])->get();
        // dd($scholars);
        return view('admin.scholar-index', compact('scholars'));
    }

    public function show($id){
        $scholar = Applicant::findOrFail($id);
        return view('admin.scholar-attendance-show', compact('scholar'));
    }
}
