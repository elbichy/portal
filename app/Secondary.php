<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Secondary extends Model
{
    protected $fillable = [
        'user_id',
        'certType',
        'nameOfSchool',
        'location',
        'secStartYear',
        'secEndYear'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
