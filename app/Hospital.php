<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
   
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hospital_name_ar','hospital_name_en','hospital_address_ar', 'hospital_address_en','req_map_location','city_id',
        'latitude', 'longitude', 'active','sort'
    ];

    
}
