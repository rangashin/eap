<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Scholar;
use Twilio\Rest\Client;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantStatus;
use App\Notifications\ApplicantResubmissionNotification;
use App\Notifications\SelectedForInterviewNotification;
use App\Notifications\WelcomeScholarNotification;
use Illuminate\Support\Facades\Notification;

class ManageApplicantController extends Controller
{

    public function __construct()
    {
        // $applicants = Applicant::all();
        $applicants = Applicant::where('applicant_statuses_id', ApplicantStatus::IS_SELECTED)->get();
        foreach($applicants as $applicant){
            $now = Carbon::now()->format('Y-m-d');
            $enddate = Carbon::parse($applicant->hasbeenselecteddate)->addDays(9)->format('Y-m-d');
            if((Carbon::parse($now))->gt($enddate) && empty($applicant->interviewdate)){
                $applicant->update(['applicant_statuses_id' => ApplicantStatus::IS_REJECTED]);

                // SMS NOTIFICATION
                // $user = User::find($applicant->user_id);
                // $number = '+639'.substr($user->contactno, 2);
                // $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
                // $message = $twilio->messages->create(
                //     $number,
                //     array(
                //         "from" => config('twilio.from'),
                //         "body" => "Hello ".$user->applicant->applicantfirstname.". Your application for EAP scholaship has been automatically rejected by the system after not choosing your interview date." 
                //     )
                // );

                continue;
            }
        }
    }

    public function index(){
        $applicants = Applicant::latest('formreceived')->with('applicantStatus')->paginate(50);

        return view('admin.applicant-index', compact('applicants'));
    }

    public function review(){
        $applicants = Applicant::latest('formreceived')->latest('updated_at')->with('applicantStatus')->where('applicant_statuses_id', ApplicantStatus::IS_UNDER_REVIEW)->paginate(50);
        return view('admin.applicant-review', compact('applicants'));
    }

    public function reviewShow($applicant){
        $applicant = Applicant::findOrFail($applicant);
        return view('admin.applicant-review-show', compact('applicant'));
    }

    public function selected(){
        $applicants = Applicant::latest('hasbeenselecteddate')->latest('formreceived')->with('applicantStatus')->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->paginate(50);
        
        return view('admin.applicant-selected', compact('applicants'));
    }

    public function rejected(){
        $applicants = Applicant::latest('formreceived')->latest('updated_at')->with('applicantStatus')->where('applicant_statuses_id', ApplicantStatus::IS_REJECTED)->paginate(50);
        return view('admin.applicant-rejected', compact('applicants'));
    }

    public function resubmit(Request $request, $applicant){
        $request->validate([
            'resubmissionmessage' => ['required', 'string'],
        ]);
        $temp = Applicant::find($applicant);
        $temp->update(['resubmissionmessage' => $request->resubmissionmessage, 'applicant_statuses_id' => ApplicantStatus::IS_NEED_RESUBMMISSION, 'issubmitted' => Applicant::IS_NOT_SUBMMITED]);
        $user = User::find($applicant);
        $data = [
            'greeting' => 'Hello '.$temp->applicantfirstname.'!',
            'body' => 'Your registration application has been tagged as resubmit because of the following:',
            'message' => '<ul><li>'.$request->resubmissionmessage.'</li></ul>',
            'ender' => '<b>Proverbs 24:16</b><br><i>for though the righteous fall seven times, they rise again,<br>but the wicked stumble when calamity strikes.</i>'
        ];
        Notification::send($user, new ApplicantResubmissionNotification($data));

        //SMS NOTIFICATION
        // $number = '+639'.substr($user->contactno, 2);
        // $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
        // $message = $twilio->messages->create(
        //     $number,
        //     array(
        //         "from" => config('twilio.from'),
        //         "body" => "Hello ".$user->applicant->applicantfirstname."! Your registration application has been tagged as resubmit. Please check your email or the system for the following resubmission message regarding to your application." 
        //     )
        // );

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
                foreach($request->userCheckbox as $id){
                    $user = User::find($id);
                    $data = [
                        'greeting' => 'Hello '.$user->applicant->applicantfirstname.'!',
                        'body' => 'Congratulations on being selected for the interview! You\'re selected as of '.$user->applicant->hasbeenselecteddate.'. Log in now using the button below to set your interview date. Failure to select an interview date within 7 days or 1 week after the selection, you will be automatically rejected by the system.',
                        'ender' => '<b>Proverbs 12:23</b><br><i>"A prudent man conceals knowledge,<br>But the heart of fools proclaims folly."</i>'
                    ];
                    Notification::send($user, new SelectedForInterviewNotification($data));

                    //SMS NOTIFICATION
                    // $number = '+639'.substr($user->contactno, 2);
                    // $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
                    // $message = $twilio->messages->create(
                    //     $number,
                    //     array(
                    //         "from" => config('twilio.from'),
                    //         "body" => "Congratulations on being selected for the interview! You're selected as of ".$user->applicant->hasbeenselecteddate.". Log in now to your set your interview date. Failure to select an interview date within 7 days or 1 week after the selection, you will be automatically rejected by the system." 
                    //     )
                    // );
                }

                return redirect()->route('admin.applicant.review.index')->with('success', 'The selection of applicants for the interview have been updated.');
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
                foreach($request->userCheckbox as $id){
                    Scholar::create(['applicant_user_id' => $id]);

                    $user = User::find($id);
                    $data = [
                        'greeting' => 'Hello '.$user->applicant->applicantfirstname.'!',
                        'body' => 'Congratulations on being accepted as an EAP scholar!',
                        'ender' => '<b>Proverbs 18:15</b><br><i>"An intelligent heart acquires knowledge, and the ear of the wise seeks knowledge."</i>'
                    ];
                    Notification::send($user, new WelcomeScholarNotification($data));

                    //SMS NOTIFICATION
                    // $number = '+639'.substr($user->contactno, 2);
                    // $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
                    // $message = $twilio->messages->create(
                    //     $number,
                    //     array(
                    //         "from" => config('twilio.from'),
                    //         "body" => "Hello ".$user->applicant->applicantfirstname."! Congratulations on being accepted as an EAP scholar! Check your email for the announcement." 
                    //     )
                    // );
                }

                return redirect()->route('admin.applicant.review.index')->with('success', 'The selection of applicants for the admission have been updated.');
            }
        }
    }

    public function setInterviewDate(Request $request){
        $request->validate([
            'interviewdate' => 'date|required'
        ]);

        Applicant::where('user_id', auth()->user()->id)->update(['interviewdate' => $request->interviewdate, 'applicant_statuses_id' => ApplicantStatus::IS_WAITING]);

        //SMS NOTIFICATION
        // $number = '+639'.substr(auth()->user()->contactno, 2);
        // $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
        // $message = $twilio->messages->create(
        //     $number,
        //     array(
        //         "from" => config('twilio.from'),
        //         "body" => "[EAP Applicant Update] You have set your interview date on ".$request->interviewdate.". Please be minded that be ready and attend your selected interview date. Failure to be present on the day of the interview will be automatically rejected." 
        //     )
        // );

        return redirect()->route('dashboard')->with('success', 'Your interview date has been set.');
    }

    public function updateApplicantSelected(Request $request){
        if(empty($request->applicantstatus)){
            return redirect()->route('admin.applicant.selected.index')->with('error', 'Warning alert! The applicant status (dropdown) field is required.');
        }elseif($request->applicantstatus == ApplicantStatus::IS_REJECTED){
            Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_REJECTED]);
            return redirect()->route('admin.applicant.selected.index')->with('success', 'The selected applicants have been rejected.');
        }elseif($request->applicantstatus == ApplicantStatus::IS_ADMITTED){
            if(Applicant::whereIn('user_id', $request->userCheckbox)->where('interviewdate', null)->exists()){
                return redirect()->route('admin.applicant.selected.index')->with('error', 'The selection of applicants for the admission MUST HAVE AN INTERVIEW DATE.');
            }else{
                Applicant::whereIn('user_id', $request->userCheckbox)->update(['applicant_statuses_id' => ApplicantStatus::IS_ADMITTED]);
                User::whereIn('id', $request->userCheckbox)->update(['role_id' => Role::IS_SCHOLAR]);
                foreach($request->userCheckbox as $id){
                    Scholar::create(['applicant_user_id' => $id]);

                    $user = User::find($id);
                    $data = [
                        'greeting' => 'Hello '.$user->applicant->applicantfirstname.'!',
                        'body' => 'Congratulations on being accepted as an EAP scholar! ',
                        'ender' => '<b>Proverbs 2:10</b><br><i>"For wisdom will come into your heart, and knowledge will be pleasant to your soul."</i>'
                    ];
                    Notification::send($user, new WelcomeScholarNotification($data));

                    //SMS NOTIFICATION
                    // $number = '+639'.substr($user->contactno, 2);
                    // $twilio = new Client(config('twilio.account_sid'), config('twilio.auth_token'));
                    // $message = $twilio->messages->create(
                    //     $number,
                    //     array(
                    //         "from" => config('twilio.from'),
                    //         "body" => "Hello ".$user->applicant->applicantfirstname."! Congratulations on being accepted as an EAP scholar! Check your email for the announcement." 
                    //     )
                    // );
                }
                return redirect()->route('admin.applicant.selected.index')->with('success', 'The selection of applicants for the admission have been updated.');
            }
        }
    }
}
