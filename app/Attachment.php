<?php

namespace App;

use App\Message;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
   
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'message_id','path'
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }

    
}
