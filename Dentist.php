<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Messagable;

use Cache;

class Dentist extends Authenticatable
{
    use Notifiable;
  use Messagable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','mobile','email', 'password','gender','nationality','birthdate','photo',
        'profile_photo','hospital','dgree','nation_id','city_id','en_name','card', 'language','active'
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
    
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function related_hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital');
    }

    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }
}