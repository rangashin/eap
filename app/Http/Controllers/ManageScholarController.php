<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAttendanceRequest;
use App\Models\ScholarStatus;

class ManageScholarController extends Controller
{
    public function index(){
        $scholars = User::where('role_id', Role::IS_SCHOLAR)->with(['applicant' => function($query){
            $query->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc')->with(['kawan', 'scholar' => function($query){
                $query->with('scholarStatus');
            }]);
        }, 'role'])->paginate(50);
        return view('admin.scholar-index', compact('scholars'));
    }

    public function updateStatus(Request $request){
        if(empty($request->scholarstatus)){
            return redirect()->route('admin.scholar.index')->with('error', 'Warning alert! The scholar status (dropdown) field is required.');
        }elseif($request->scholarstatus == ScholarStatus::IS_REGULAR){
            Scholar::whereIn('applicant_user_id', $request->userCheckbox)->update(['scholar_statuses_id' => ScholarStatus::IS_REGULAR]);
            return redirect()->route('admin.scholar.index')->with('success', 'The status of selected scholars have been updated.');
        }elseif($request->scholarstatus == ScholarStatus::IS_CONDITIONAL){
            Scholar::whereIn('applicant_user_id', $request->userCheckbox)->update(['scholar_statuses_id' => ScholarStatus::IS_CONDITIONAL]);
            return redirect()->route('admin.scholar.index')->with('success', 'The status of selected scholars have been updated.');
        }elseif($request->scholarstatus == ScholarStatus::IS_INCOMPLETE){
            Scholar::whereIn('applicant_user_id', $request->userCheckbox)->update(['scholar_statuses_id' => ScholarStatus::IS_INCOMPLETE]);
            return redirect()->route('admin.scholar.index')->with('success', 'The status of selected scholars have been updated.');
        }
    }

    public function show($id){
        $scholar = Applicant::findOrFail($id);
        $scholarfiles = Scholar::findOrFail($id);
        $regis = $scholarfiles->getMedia('scholar_regi');
        $reports = $scholarfiles->getMedia('scholar_report');
        return view('admin.scholar-show', compact('scholar', 'regis', 'reports'));
    }

    public function editAttendance($user_id){
        $scholar = Scholar::findOrFail($user_id);
        return view('admin.scholar-attendance-edit', compact('scholar'));
    }

    public function editRequirements($user_id){
        $scholar = Scholar::findOrFail($user_id);
        $regis = $scholar->getMedia('scholar_regi');
        $reports = $scholar->getMedia('scholar_report');
        return view('admin.scholar-requirements-edit', compact('scholar', 'regis', 'reports'));
    }

    public function update(UpdateAttendanceRequest $request, $applicant_user_id){
        $request->validated();
        $temp = Scholar::find($applicant_user_id);
        $totalstudent = $temp->student;
        $totalparent = $temp->parent;
        $totalcombinedattendance = floor($totalstudent ?? 0 + $totalparent ?? 0);
        $temp->update([
            'firststudent' => $request->firststudent,
            'secondstudent' => $request->secondstudent,
            'thirdstudent' => $request->thirdstudent,
            'fourthstudent' => $request->fourthstudent,
            'totalstudent' => $totalstudent,
            'firstparent' => $request->firstparent,
            'secondparent' => $request->secondparent,
            'thirdparent' => $request->thirdparent,
            'fourthparent' =>  $request->fourthparent,
            'totalparent' => $totalparent,
            'totalcombinedattendance' => $totalcombinedattendance,
        ]);
        
        return redirect()->route('admin.scholar.show', $applicant_user_id)->with('success', $temp->applicant->full_name.'\'s attendance has been updated.');
    }

    public function destroyRegi($user_id, $id){
        $scholar = Scholar::findOrFail($user_id);
        $regis = $scholar->getMedia('scholar_regi');
        $regis[$id]->delete();
        $scholar->update(['scholar_statuses_id' => ScholarStatus::IS_INCOMPLETE]);
        return redirect()->route('admin.scholar.requirements-edit', $user_id)->with('success', $scholar->applicant->full_name.'\'s requirements have been modified.');
    }

    public function destroyReport($user_id, $id){
        $scholar = Scholar::findOrFail($user_id);
        $reports = $scholar->getMedia('scholar_report');
        $reports[$id]->delete();
        $scholar->update(['scholar_statuses_id' => ScholarStatus::IS_INCOMPLETE]);
        return redirect()->route('admin.scholar.requirements-edit', $user_id)->with('success', $scholar->applicant->full_name.'\'s requirements have been modified.');
    }

    public function resubmit(Request $request, $applicant_user_id){
        $request->validate([
            'scholarresubmissionmessage' => ['required', 'string'],
        ]);

        $temp = Scholar::find($applicant_user_id);
        $temp->update(['scholarresubmissionmessage' => $request->scholarresubmissionmessage, 'scholar_statuses_id' => ScholarStatus::IS_INCOMPLETE]);
        return redirect()->route('admin.scholar.show', $applicant_user_id)->with('success', $temp->applicant->full_name.' needs resubmission of requirements.');
    }
}
