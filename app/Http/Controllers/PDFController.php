<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Scholar;
use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantStatus;
use App\Models\ScholarStatus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class PDFController extends Controller
{
    public function index(){
        return view('admin.report-generation');
    }

    public function generateReport(Request $request){
        // dd($request->all());

        if(empty($request->category)){
            return redirect()->route('admin.report.index')->with('error', 'Warning alert! The category (dropdown) field is required.');
        }elseif($request->category == 'applicant'){
            if(empty($request->applicantstatusreport)){
                return redirect()->route('admin.report.index')->with('error', 'Warning alert! The applicant status (dropdown) field is required.');
            }elseif($request->applicantstatusreport == 'all'){
                $applicants = Applicant::orderBy('applicantlastname', 'asc')->orderBy('yearlevel', 'asc')->with('applicantStatus')->get();

                $data = ['applicants' => $applicants];

                $pdf = Pdf::loadView('pdf.applicants-pdf', $data);
                return $pdf->download('EAP All Applicants.pdf');
            }elseif($request->applicantstatusreport == 'underreview'){
                if(empty($request->underreviewdatespan)){
                    return redirect()->route('admin.report.index')->with('error', 'Warning alert! The date span (dropdown) field is required.');
                }elseif($request->underreviewdatespan == 'lastweek'){
                    $applicants = Applicant::orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc')->where('applicant_statuses_id', ApplicantStatus::IS_UNDER_REVIEW)->whereBetween('created_at', [Carbon::now()->subDays(7)->toDateTimeString(), Carbon::now()->toDateTimeString()])->with('kawan', 'applicantStatus')->get();

                    $data = ['applicants' => $applicants];

                    $pdf = Pdf::loadView('pdf.applicants-review-pdf', $data);
                    return $pdf->download('EAP All Applicants (Last 7 days).pdf');
                }elseif($request->underreviewdatespan == 'lastmonth'){
                    $applicants = Applicant::orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc')->where('applicant_statuses_id', ApplicantStatus::IS_UNDER_REVIEW)->whereBetween('created_at', [Carbon::now()->subDays(30)->toDateTimeString(), Carbon::now()->toDateTimeString()])->with('kawan', 'applicantStatus')->get();

                    $data = ['applicants' => $applicants];

                    $pdf = Pdf::loadView('pdf.applicants-review-pdf', $data);
                    return $pdf->download('EAP All Applicants (Last 30 days).pdf');
                }
            }elseif($request->applicantstatusreport == 'selectedwaiting'){
                $applicants = Applicant::orderBy('applicantlastname', 'asc')->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->get();

                $data = ['applicants' => $applicants];

                $pdf = Pdf::loadView('pdf.applicants-selected-pdf', $data);
                return $pdf->download('EAP Interview Selection.pdf');
            }elseif($request->applicantstatusreport == 'rejected'){
                $applicants = Applicant::orderBy('applicantlastname', 'asc')->where('applicant_statuses_id', ApplicantStatus::IS_REJECTED)->get();

                $data = ['applicants' => $applicants];

                $pdf = Pdf::loadView('pdf.applicants-rejected-pdf', $data);
                return $pdf->download('EAP Rejected Applicants.pdf');
            }
        }elseif($request->category == 'scholar'){
            if(empty($request->scholarstatusreport)){
                return redirect()->route('admin.report.index')->with('error', 'Warning alert! The scholar status (dropdown) field is required.');
            }elseif($request->scholarstatusreport == 'all'){
                $scholars = Scholar::with(['applicant' => function($query){
                    $query->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }, 'scholarStatus'])->get();

                $data = ['scholars' => $scholars];

                $pdf = Pdf::loadView('pdf.scholars-pdf', $data);
                return $pdf->download('EAP All Scholars.pdf');
            }elseif($request->scholarstatusreport == 'regular'){
                $scholars = Scholar::where('scholar_statuses_id', ScholarStatus::IS_REGULAR)->with(['applicant' => function($query){
                    $query->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }])->get();

                $data = ['scholars' => $scholars, 'temp' => '(Regular)'];

                $pdf = Pdf::loadView('pdf.scholars-with-status-pdf', $data);
                return $pdf->download('EAP Scholars (Regular).pdf');
            }elseif($request->scholarstatusreport == 'conditional'){
                $scholars = Scholar::where('scholar_statuses_id', ScholarStatus::IS_CONDITIONAL)->with(['applicant' => function($query){
                    $query->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }])->get();

                $data = ['scholars' => $scholars, 'temp' => '(Conditional)'];

                $pdf = Pdf::loadView('pdf.scholars-with-status-pdf', $data);
                return $pdf->download('EAP Scholars (Conditional).pdf');
            }elseif($request->scholarstatusreport == 'incomplete'){
                $scholars = Scholar::where('scholar_statuses_id', ScholarStatus::IS_INCOMPLETE)->with(['applicant' => function($query){
                    $query->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }])->get();

                $data = ['scholars' => $scholars, 'temp' => '(Incomplete)'];

                $pdf = Pdf::loadView('pdf.scholars-with-status-pdf', $data);
                return $pdf->download('EAP Scholars (Incomplete).pdf');
            }
        }
    }

    public function kawanIndex(){
        return view('kawan.report-generation');
    }

    public function kawanGenerateReport(Request $request){
        if(empty($request->category)){
            return redirect()->route('kawan.report.index')->with('error', 'Warning alert! The category (dropdown) field is required.');
        }elseif($request->category == 'applicant'){
            if(empty($request->applicantstatusreport)){
                return redirect()->route('kawan.report.index')->with('error', 'Warning alert! The applicant status (dropdown) field is required.');
            }elseif($request->applicantstatusreport == 'selectedwaiting'){
                if(empty($request->selecteddatespan)){
                    return redirect()->route('kawan.report.index')->with('error', 'Warning alert! The date span (dropdown) field is required.');
                }elseif($request->selecteddatespan == 'all'){
                    $applicants = Applicant::latest('interviewdate')->latest('hasbeenselecteddate')->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->whereNot(function ($query){
                        $query->where('kawan_id', auth()->user()->adminProfile->kawan_id);
                    })->with('kawan')->get();
    
                    $data = ['applicants' => $applicants];

                    $pdf = Pdf::loadView('pdf.kawan-applicants-selected-pdf', $data);
                    return $pdf->download('EAP Interview Selection.pdf');
                }elseif($request->selecteddatespan == 'today'){
                    $applicants = Applicant::latest('interviewdate')->latest('hasbeenselecteddate')->where('interviewdate', Carbon::now()->toDateString())->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->whereNot(function ($query){
                        $query->where('kawan_id', auth()->user()->adminProfile->kawan_id);
                    })->with('kawan')->get();
    
                    $data = ['applicants' => $applicants];
                    
                    $pdf = Pdf::loadView('pdf.kawan-applicants-selected-pdf', $data);
                    return $pdf->download('EAP Interview Selection.pdf');
                }elseif($request->selecteddatespan == 'tomorrow'){
                    $applicants = Applicant::latest('interviewdate')->latest('hasbeenselecteddate')->where('interviewdate', Carbon::now()->addDays(1)->toDateString())->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->whereNot(function ($query){
                        $query->where('kawan_id', auth()->user()->adminProfile->kawan_id);
                    })->with('kawan')->get();
    
                    $data = ['applicants' => $applicants];
                    
                    $pdf = Pdf::loadView('pdf.kawan-applicants-selected-pdf', $data);
                    return $pdf->download('EAP Interview Selection.pdf');
                }elseif($request->selecteddatespan == 'thisweek'){
                    $applicants = Applicant::latest('interviewdate')->latest('hasbeenselecteddate')->whereBetween('interviewdate', [Carbon::now()->toDateString(), Carbon::now()->addDays(7)->toDateString()])->whereIn('applicant_statuses_id', [ApplicantStatus::IS_SELECTED, ApplicantStatus::IS_WAITING])->whereNot(function ($query){
                        $query->where('kawan_id', auth()->user()->adminProfile->kawan_id);
                    })->with('kawan')->get();
    
                    $data = ['applicants' => $applicants];
                    
                    $pdf = Pdf::loadView('pdf.kawan-applicants-selected-pdf', $data);
                    return $pdf->download('EAP Interview Selection.pdf');
                }
            }
        }elseif($request->category == 'scholar'){
            if(empty($request->scholarstatusreport)){
                return redirect()->route('admin.report.index')->with('error', 'Warning alert! The scholar status (dropdown) field is required.');
            }elseif($request->scholarstatusreport == 'all'){
                $scholars = Scholar::with(['applicant' => function($query){
                    $query->where('kawan_id', auth()->user()->adminProfile->kawan_id)->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }, 'scholarStatus'])->get();

                $data = ['scholars' => $scholars];

                $pdf = Pdf::loadView('pdf.scholars-pdf', $data);
                return $pdf->download('EAP All Scholars.pdf');
            }elseif($request->scholarstatusreport == 'regular'){
                $scholars = Scholar::where('scholar_statuses_id', ScholarStatus::IS_REGULAR)->with(['applicant' => function($query){
                    $query->where('kawan_id', auth()->user()->adminProfile->kawan_id)->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }])->get();

                $data = ['scholars' => $scholars, 'temp' => '(Regular)'];

                $pdf = Pdf::loadView('pdf.scholars-with-status-pdf', $data);
                return $pdf->download('EAP Scholars (Regular).pdf');
            }elseif($request->scholarstatusreport == 'conditional'){
                $scholars = Scholar::where('scholar_statuses_id', ScholarStatus::IS_CONDITIONAL)->with(['applicant' => function($query){
                    $query->where('kawan_id', auth()->user()->adminProfile->kawan_id)->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }])->get();

                $data = ['scholars' => $scholars, 'temp' => '(Conditional)'];

                $pdf = Pdf::loadView('pdf.scholars-with-status-pdf', $data);
                return $pdf->download('EAP Scholars (Conditional).pdf');
            }elseif($request->scholarstatusreport == 'incomplete'){
                $scholars = Scholar::where('scholar_statuses_id', ScholarStatus::IS_INCOMPLETE)->with(['applicant' => function($query){
                    $query->where('kawan_id', auth()->user()->adminProfile->kawan_id)->orderBy('applicantlastname', 'asc')->orderBy('kawan_id', 'asc');
                }])->get();

                $data = ['scholars' => $scholars, 'temp' => '(Incomplete)'];

                $pdf = Pdf::loadView('pdf.scholars-with-status-pdf', $data);
                return $pdf->download('EAP Scholars (Incomplete).pdf');
            }
        }
    }
}
