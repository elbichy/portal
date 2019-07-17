<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Personal extends Model
{
    protected $fillable = [
        'user_id',
        'othername',
        'gender',
        'dob',
        'maritalStatus',
        'tribe',
        'religion',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getGenderAttribute($value)
    {
        return ucfirst($value);
    }
}
