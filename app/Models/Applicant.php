<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Applicant extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('picture')->singleFile();
        $this->addMediaCollection('baptismal_new')->singleFile();
        $this->addMediaCollection('birth_new')->singleFile();
        // $this->addMediaCollection('regi_report_new')->singleFile();
        $this->addMediaCollection('applicant_regi')->singleFile();
        $this->addMediaCollection('applicant_report')->singleFile();
    }

    public function getFullNameAttribute(){
        return $this->applicantfirstname . ' ' . (is_null($this->applicantmiddlename) ? '' : $this-> applicantmiddlename) . ' ' . $this->applicantlastname . (is_null($this->applicantsuffix) ? '' :  ' ' . $this->applicantsuffix);
    }
    
    public function getFamilyTotalIncomeAttribute(){
        return $this->fatherincome + $this->motherincome + $this->siblingstotalincome;
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kawan(){
        return $this->belongsTo(Kawan::class, 'kawan_id');
    }

    public function ministryApplicant(){
        return $this->belongsTo(Ministry::class, 'applicantministry');
    }

    public function ministryParentApplicant(){
        return $this->belongsTo(Ministry::class, 'parentapplicantministry');
    }
    
    public function applicantStatus(){
        return $this->belongsTo(ApplicantStatus::class, 'applicant_statuses_id');
    }

    public function pwdMembers(){
        return $this->hasMany(PWDFamilyMemberApplicant::class);
    }

    public function siblingMembers(){
        return $this->hasMany(SiblingMemberApplicant::class);
    }

    public function otherMembers(){
        return $this->hasMany(OtherMemberApplicant::class);
    }

    public function scholar(){
        return $this->hasOne(Scholar::class);
    }

    public function yearlevel(){
        return $this->belongsTo(YearLevel::class, 'year_level');
    }

    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id',
        'kawan_id',
        'renewal',
        'genave',
        'scholaryears',
        'applicantfirstname',
        'applicantmiddlename',
        'applicantlastname',
        'applicantsuffix',
        'applicantbirthdate',
        'applicantsex',
        'applicantcontactno',
        'applicantaddress',
        'gradeyearorlevel',
        'yearlevel',
        'course',
        'schoolname',
        'schooladdress',
        'fathername',
        'fatherage',
        'fatheroccupation',
        'fatherincome',
        'fathercontactno',
        'fatherreligion',
        'mothername',
        'motherage',
        'motheroccupation',
        'motherincome',
        'mothercontactno',
        'motherreligion',
        'parentstatus',
        'guardianname',
        'guardiancontactno',
        'siblingsnumberofworking',
        'siblingstotalincome',
        'applicantministryans',
        'applicantministry',
        'parentapplicantministryans',
        'parentapplicantministry',
        'interviewdate',
        'hasbeenselecteddate',
        'formreceived',
        'issubmitted',
        'resubmissionmessage',
        'applicant_statuses_id',
        'sawpoints',
    ];

    public const IS_NOT_SUBMMITED = 0;
    public const IS_SUBMITTED = 1;
}
