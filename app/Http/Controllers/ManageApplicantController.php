<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantStatus;

class ManageApplicantController extends Controller
{
    public function index(){
        $applicants = Applicant::latest('formreceived')->with('applicantStatus')->get();
        return view('admin.applicant-index', compact('applicants'));
    }

    public function review(){
        $applicants = Applicant::latest('formreceived')->latest('updated_at')->with('applicantStatus')->where('applicant_statuses_id', ApplicantStatus::IS_UNDER_REVIEW)->get();
        return view('admin.applicant-review', compact('applicants'));
    }

    public function reviewShow($applicant){
        $applicant = Applicant::findOrFail($applicant);
        return view('admin.applicant-review-show', compact('applicant'));
    }

    public function selected(){
        $applicants = Applicant::latest('hasbeenselecteddate')->latest('formreceived')->with('applicantStatus')->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->get();
        return view('admin.applicant-selected', compact('applicants'));
    }

    public function rejected(){
        $applicants = Applicant::latest('formreceived')->latest('updated_at')->with('applicantStatus')->where('applicant_statuses_id', ApplicantStatus::IS_REJECTED)->get();
        return view('admin.applicant-rejected', compact('applicants'));
    }

    public function resubmit(Request $request, $applicant){
        $request->validate([
            'resubmissionmessage' => ['required', 'string'],
        ]);
        $temp = Applicant::find($applicant);
        $temp->update(['resubmissionmessage' => $request->resubmissionmessage, 'applicant_statuses_id' => ApplicantStatus::IS_UNDER_REVIEW, 'issubmitted' => Applicant::IS_NOT_SUBMMITED]);

        return redirect()->route('admin.applicant.review.index')->with('success', $temp->full_name.' has been resubmitted.');
    }

    public function updateApplicantReview(Request $request){
        if(empty($request->applicantstatus)){
            return redirect()->route('admin.applicant.review.index')->with('error', 'Warning alert! The applicant status (dropdown) field is required.');
        }elseif($request->applicantstatus == ApplicantStatus::IS_SELECTED){
            if(Applicant::whereIn('user_id', $request->userCheckbox)->where('renewal', 'OLD')->exists()){
                return redirect()->route('admin.applicant.review.index')->with('error', 'Selection for interview must be a NEW applicant.');
            }else{
                Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_SELECTED, 'hasbeenselecteddate' => date('Y-m-d')]);
                return redirect()->route('admin.applicant.review.index')->with('success', 'The selection of applicant/s for the interview has been updated.');
            }
        }elseif($request->applicantstatus == ApplicantStatus::IS_REJECTED){
            Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_REJECTED]);
            return redirect()->route('admin.applicant.review.index')->with('success', 'The selected applicants have been rejected.');
        }elseif($request->applicantstatus == ApplicantStatus::IS_ADMITTED){
            if(Applicant::whereIn('user_id', $request->userCheckbox)->where('renewal', 'NEW')->exists()){
                return redirect()->route('admin.applicant.review.index')->with('error', 'Selection for admission must be an OLD applicant.');
            }else{
                Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_ADMITTED]);
                User::whereIn('id', $request->userCheckbox)->update(['role_id' => Role::IS_SCHOLAR]);
                return redirect()->route('admin.applicant.review.index')->with('success', 'The selection of applicant/s for the admission has been updated.');
            }
        }
    }

    public function setInterviewDate(Request $request){
        // dd($request->all());
        $request->validate([
            'interviewdate' => 'date|required'
        ]);

        Applicant::where('user_id', auth()->user()->id)->update(['interviewdate' => $request->interviewdate, 'applicant_statuses_id' => ApplicantStatus::IS_WAITING]);

        return redirect()->route('dashboard')->with('success', 'Your interview date has been set.');
    }

    public function updateApplicantSelected(Request $request){
        if(empty($request->applicantstatus)){
            return redirect()->route('admin.applicant.selected.index')->with('error', 'Warning alert! The applicant status (dropdown) field is required.');
        }elseif($request->applicantstatus == ApplicantStatus::IS_REJECTED){
            Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_REJECTED]);
            return redirect()->route('admin.applicant.selected.index')->with('success', 'The selected applicants have been rejected.');
        }elseif($request->applicantstatus == ApplicantStatus::IS_ADMITTED){
            Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_ADMITTED]);
            User::whereIn('id', $request->userCheckbox)->update(['role_id' => Role::IS_SCHOLAR]);
            return redirect()->route('admin.applicant.selected.index')->with('success', 'The selection of applicant/s for the admission has been updated.');
        }
    }

}
