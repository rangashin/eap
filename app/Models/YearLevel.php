<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YearLevel extends Model
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
        'yearleveldescription',
    ];

    public const IS_COLLEGE = 'C';
    public const IS_ELEMENTARY = 'E';
    public const IS_HIGHSCHOOL = 'HS';
    public const IS_SENIORHIGHSCHOOL = 'C';
}
