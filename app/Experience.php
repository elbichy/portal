<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Experience extends Model
{
    protected $fillable = [
        'user_id',
        'organisation',
        'location',
        'role',
        'startDate',
        'endDate'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
