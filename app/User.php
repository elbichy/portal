<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Cadre;
use App\Rank;
use App\Personal;
use App\Contact;
use App\Medical;
use App\NextOfKin;
use App\Primary;
use App\Secondary;
use App\Tertiary;
use App\Certification;
use App\Experience;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'cadre_id',
        'rank_id',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function personal(){
        return $this->hasOne('App\Personal');
    }
    
    public function contact(){
        return $this->hasOne('App\Contact');
    }
    
    public function medical(){
        return $this->hasOne('App\Medical');
    }
    
    public function primary(){
        return $this->hasMany('App\Primary');
    }
    
    public function secondary(){
        return $this->hasMany('App\Secondary');
    }
    
    public function tertiary(){
        return $this->hasMany('App\Tertiary');
    }
    
    public function nextOfKin(){
        return $this->hasMany('App\NextOfKin');
    }
    
    public function certification(){
        return $this->hasMany('App\Certification');
    }
    
    public function experience(){
        return $this->hasMany('App\Experience');
    }
    
    public function cadre(){
        return $this->belongsTo('App\Cadre');
    }
    
    public function rank(){
        return $this->belongsTo('App\Rank');
    }
}
