<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    use HasFactory;

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
        'scholar_statuses_id',
    ];
}
