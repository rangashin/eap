<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarStatus extends Model
{
    use HasFactory;

    public function scholar(){
        return $this->hasOne(Scholar::class);
    }

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'status',
    ];

    public const IS_REGULAR = 'R';
    public const IS_CONDITIONAL = 'C';
    public const IS_INCOMPLETE = 'I';
}
