<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use App\Models\ApplicantStatus;
use App\Http\Requests\StoreOrUpdateApplicantRequest;
use App\Models\OtherMemberApplicant;
use App\Models\PWDFamilyMemberApplicant;
use App\Models\SiblingMemberApplicant;
use App\Models\YearLevel;

class ApplicantController extends Controller
{
    public function edit(){
        if(Applicant::where('user_id', auth()->user()->id)->doesntExist()){
            return view('applicant.registration-new');
        }else{
            $applicant = Applicant::find(auth()->user()->id);
            if($applicant->issubmitted == Applicant::IS_SUBMITTED){
                return view('applicant.registration-show', compact('applicant'));
            }elseif($applicant->issubmitted == Applicant::IS_NOT_SUBMMITED){
                return view('applicant.registration-update', compact('applicant'));
            }
        }
    }

    //StoreOrUpdateApplicantRequest     Request
    public function update(StoreOrUpdateApplicantRequest $request){

        $elementary = ['GRADE 1', 'GRADE 2', 'GRADE 3', 'GRADE 4', 'GRADE 5', 'GRADE 6'];
        $highschool = ['GRADE 7', 'GRADE 8', 'GRADE 9', 'GRADE 10'];
        $seniorhighschool = ['GRADE 11', 'GRADE 12'];
        $college = ['1ST YEAR COLLEGE', '2ND YEAR COLLEGE', '3RD YEAR COLLEGE', '4TH YEAR COLLEGE'];
        // dd($request->all());

        $request->validated();
        
        Applicant::updateOrCreate([
            'user_id' => auth()->user()->id,
        ], [
            'kawan_id' => $request->kawan_id,
            'renewal' => $request->renewal,
            'scholaryears' => $request->renewal == 'OLD' ? $request->scholaryears : 0,
            'genave' => !empty($request->genave) ? $request->genave : (!empty($request->elemtohsgenave) ? $request->elemtohsgenave : $request->collegegenave),
            'applicantfirstname' => strtoupper($request->applicantfirstname),
            'applicantmiddlename' => strtoupper($request->applicantmiddlename),
            'applicantlastname' => strtoupper($request->applicantlastname),
            'applicantsuffix' => !empty($request->applicantsuffix) ? strtoupper($request->applicantsuffix) : null,
            'applicantbirthdate' => $request->applicantbirthdate,
            'applicantsex' => strtoupper($request->applicantsex),
            'applicantcontactno' => $request->applicantcontactno,
            'applicantaddress' => strtoupper($request->applicantaddress),
            'gradeyearorlevel' => strtoupper($request->gradeyearorlevel),
            'yearlevel' => in_array($request->gradeyearorlevel, $elementary) ? YearLevel::IS_ELEMENTARY : (in_array($request->gradeyearorlevel, $highschool) ? YearLevel::IS_HIGHSCHOOL : (in_array($request->gradeyearorlevel, $seniorhighschool) ? YearLevel::IS_SENIORHIGHSCHOOL : YearLevel::IS_COLLEGE)),
            'course' => !empty($request->course) ? strtoupper($request->course) : null,
            'schoolname' => strtoupper($request->schoolname),
            'schooladdress' => strtoupper($request->schooladdress),
            'fathername' => !empty($request->fathername) ? strtoupper($request->fathername) : null,
            'fatherage' => !empty($request->fatherage) ? $request->fatherage : null,
            'fatheroccupation' => !empty($request->fatheroccupation) ? strtoupper($request->fatheroccupation) : null,
            'fatherincome' => !empty($request->fatherincome) ? $request->fatherincome : null,
            'fathercontactno' => !empty($request->fathercontactno) ? $request->fathercontactno : null,
            'fatherreligion' => !empty($request->fatherreligion) ? strtoupper($request->fatherreligion) : null,
            'mothername' => !empty($request->mothername) ? strtoupper($request->mothername) : null,
            'motherage' => !empty($request->motherage) ? $request->motherage : null,
            'motheroccupation' => !empty($request->motheroccupation) ? strtoupper($request->motheroccupation) : null,
            'motherincome' => !empty($request->motherincome) ? $request->motherincome : null,
            'mothercontactno' => !empty($request->mothercontactno) ? $request->mothercontactno : null,
            'motherreligion' => !empty($request->motherreligion) ? strtoupper($request->motherreligion) : null,
            'parentstatus' => !empty($request->fathername) || !empty($request->mothername) ? strtoupper($request->parentstatus) : null,
            'guardianname' => !empty($request->guardianname) ? strtoupper($request->guardianname) : null,
            'guardiancontactno' => !empty($request->guardiancontactno) ? $request->guardiancontactno : null,
            'siblingsnumberofworking' => $request->siblingsnumberofworking,
            'siblingstotalincome' => $request->siblingstotalincome,
            'applicantministry' => $request->applicantministryans == 'OO' ? $request->applicantministry : null,
            'parentapplicantministry' => $request->parentapplicantministryans == 'OO' ? $request->parentapplicantministry : null,
            'formreceived' => date('Y-m-d'),
            'issubmitted' => Applicant::IS_SUBMITTED,
            'applicant_statuses_id' => ApplicantStatus::IS_UNDER_REVIEW,
        ]);
    
        $applicant = Applicant::find(auth()->user()->id);
        $applicant->clearMediaCollection('picture');
        $applicant->clearMediaCollection('baptismal_new');
        $applicant->clearMediaCollection('birth_new');
        $applicant->clearMediaCollection('regi_report_new');
        $applicant->clearMediaCollection('regi_old');
        $applicant->clearMediaCollection('report_old');

        $applicant->addMedia($request->file_input_picture)->toMediaCollection('picture');
        if($applicant->renewal == 'NEW'){
            $applicant->addMedia($request->file_input_baptismal)->toMediaCollection('baptismal_new');
            $applicant->addMedia($request->file_input_birth)->toMediaCollection('birth_new');
            $applicant->addMedia($request->file_input_regi_report)->toMediaCollection('regi_report_new');
        }elseif($applicant->renewal == 'OLD'){
            $applicant->addMedia($request->file_input_regi)->toMediaCollection('regi_old');
            $applicant->addMedia($request->file_input_report)->toMediaCollection('report_old');
        }
        
        // dd($applicant->id);

        if(count($request->pwdname) > 0){
            PWDFamilyMemberApplicant::where('applicant_user_id', auth()->user()->id)->delete();
            $pwdCount = count($request->pwdname);
            foreach(range(0, $pwdCount - 1) as $id){
                if(!empty($request->pwdname[$id])){
                    PWDFamilyMemberApplicant::create([
                        'applicant_user_id' => auth()->user()->id,
                        'pwdname' => strtoupper($request->pwdname[$id]),
                        'pwdage' => $request->pwdage[$id],
                    ]);
                }else{
                    break;
                }
            }
        }

        if(count($request->siblingname) > 0){
            SiblingMemberApplicant::where('applicant_user_id', auth()->user()->id)->delete();
            $siblingCount = count($request->siblingname);
            foreach(range(0, $siblingCount - 1) as $id){
                if(!empty($request->siblingname[$id])){
                    SiblingMemberApplicant::create([
                        'applicant_user_id' => auth()->user()->id,
                        'siblingname' => strtoupper($request->siblingname[$id]),
                        'siblingage' => $request->siblingage[$id],
                        'siblingyearorwork' => strtoupper($request->siblingyearorwork[$id]),
                    ]);
                }else{
                    break;
                }
            }
        }

        if(count($request->relativename) > 0){
            OtherMemberApplicant::where('applicant_user_id', auth()->user()->id)->delete();
            $relativeCount = count($request->relativename);
            foreach(range(0, $relativeCount - 1) as $id){
                if(!empty($request->relativename[$id])){
                    OtherMemberApplicant::create([
                        'applicant_user_id' => auth()->user()->id,
                        'relativename' => strtoupper($request->relativename[$id]),
                        'relativeage' => $request->relativeage[$id],
                        'relativerelation' => strtoupper($request->relativerelation[$id]),
                        'relativework' => strtoupper($request->relativework[$id]),
                    ]);
                }else{
                    break;
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Registration Has Been Submitted');
    }
}
