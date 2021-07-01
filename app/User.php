<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Messagable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','mobile','email', 'password','admin','gender','nationality','otp','birthdate',
        'api_token','city_id','gallery', 'language'
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
        "gallery" => "array"
    ];
	 public function permission()
    {
      return $this->belongsToMany(permission::class);

    }
    
    public function nationalty()
    {
        return $this->belongsTo(Nationality::class,'nationality');
    }
    
    public function city()
      {
          return $this->belongsTo(City::class);
      }

    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }
}
