<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }

    protected $fillable = [
        'roletype',
    ];

    public const IS_NEW = 1;
    public const IS_APPLICANT = 2;
    public const IS_SCHOLAR = 3;
    public const IS_SECRETARY = 4;
    public const IS_LEADER_NEW = 5;
    public const IS_LEADER = 6;
    // public const IS_PRIEST = 6;
    // public const IS_ADVISER = 7;
}
