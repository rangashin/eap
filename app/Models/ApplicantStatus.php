<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicantStatus extends Model
{
    use HasFactory;

    public function applicant(){
        return $this->hasOne(Applicant::class);
    }

    protected $fillable = ['status'];

    public const IS_UNDER_REVIEW = 1;
    public const IS_NEED_RESUBMMISSION = 2;
    public const IS_SELECTED = 3;
    public const IS_REJECTED = 4;
    public const IS_ADMITTED = 5;
    public const IS_NOT_YET_REGISTERED = 6;
    public const IS_WAITING = 7;
}
