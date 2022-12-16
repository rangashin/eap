<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminProfile extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function kawan(){
        return $this->belongsTo(Kawan::class, 'kawan_id');
    }

    protected $primaryKey = 'user_id';
    
    protected $fillable = [
        'user_id',
        'adminfullname',
        'adminaddress',
        'adminbirthdate',
        'sex',
        'kawan_id',
    ];
}
