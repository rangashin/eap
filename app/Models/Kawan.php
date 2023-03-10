<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kawan extends Model
{
    use HasFactory;
    
    public function adminProfile(){
        return $this->hasOne(UserProfile::class);
    }

    public function applicant(){
        return $this->hasOne(Applicant::class);
    }

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kawanname',
    ];
}
