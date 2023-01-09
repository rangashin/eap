<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;

    public function applicant(){
        return $this->hasOne(Applicant::class);
    }

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';
    
    protected $fillable = [
        'id',
        'ministryname',
    ];

    
}
