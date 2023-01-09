<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherMemberApplicant extends Model
{
    use HasFactory;

    public function applicant(){
        return $this->belongsTo(Applicant::class, 'applicant_user_id');
    }
    
    protected $primaryKey = 'applicant_user_id';

    protected $fillable = [
        'applicant_user_id',
        'relativename',
        'relativeage',
        'relativerelation',
        'relativework',
    ];
}
