<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Scholar extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('scholar_regi');
        $this->addMediaCollection('scholar_report');
    }

    public function getStudentAttribute(){
        return (!empty($this->firststudent) ? 1 : 0) + (!empty($this->secondstudent) ? 1 : 0) + (!empty($this->thirdstudent) ? 1 : 0) + (!empty($this->fourthstudent) ? 1 : 0);
    }

    public function getParentAttribute(){
        return (!empty($this->firstparent) ? 1 : 0) + (!empty($this->secondparent) ? 1 : 0) + (!empty($this->thirdparent) ? 1 : 0) + (!empty($this->fourthparent) ? 1 : 0);
    }

    public function getTotalAttribute(){
        return floor($this->totalstudent ?? 0 + $this->totalparent ?? 0);
    }

    public function applicant(){
        return $this->belongsTo(Applicant::class, 'applicant_user_id');
    }

    public function scholarStatus(){
        return $this->belongsTo(ScholarStatus::class, 'scholar_statuses_id');
    }

    protected $primaryKey = 'applicant_user_id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'applicant_user_id',
        'firststudent',
        'secondstudent',
        'thirdstudent',
        'fourthstudent',
        'totalstudent',
        'firstparent',
        'secondparent',
        'thirdparent',
        'fourthparent',
        'totalparent',
        'totalcombinedattendance',
        'scholarresubmissionmessage',
        'scholar_statuses_id',
    ];
}
