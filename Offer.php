<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
     protected $fillable = ['offer_booking_price','user_id','offer_id','offer_booking_status'];
}
