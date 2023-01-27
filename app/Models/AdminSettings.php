<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminSettings extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'applicantssubmission',
        'scholarssubmission',
        'academicyear',
    ];

    public const IS_ON = 1;
    public const IS_OFF = 0;
}
