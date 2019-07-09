<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Primary extends Model
{
    protected $fillable = [
        'user_id',
        'certType',
        'nameOfSchool',
        'location',
        'priStartYear',
        'priEndYear'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
