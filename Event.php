<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['title','start_date','end_date','user_id',
        'dentist_id','treatment_id','hospital_id','photo','photo2','photo3','photo4','photo5',
        'is_diseases','diseases','is_drugs','drugs','status','follower_id','reason','start_time','end_time','event_date'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'treatment_id');
    }
    
    
     public function sendmessage2($body,$ids)
    {
        $content = array(
        "en" => $body
        );
        
        $header = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "963c6d5d-e9c2-448c-a9cc-9074edd06842",
        'include_player_ids' => array($ids),
        'android_channel_id'=>"c44de74c-20b1-4d25-99a0-d30e85e39bd5",
        "headings" => $header,
        'content_available' => true,
        'contents' => $content,
        
    );

    $fields = json_encode($fields);
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    
    
            $contents = array(
        "en" => $body
        );
        
        $headers = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "8594d9ac-3416-48f4-9290-3d957ee332ac",
        'include_player_ids' => array($ids),

        "headings" => $headers,
        'content_available' => true,
        'contents' => $contents,
        
    );

    $fields = json_encode($fields);
   
    $chs = curl_init();
    curl_setopt($chs, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($chs, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($chs, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($chs, CURLOPT_HEADER, FALSE);
    curl_setopt($chs, CURLOPT_POST, TRUE);
    curl_setopt($chs, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($chs, CURLOPT_SSL_VERIFYPEER, FALSE);

    $responses = curl_exec($chs);
    curl_close($chs);
    
    
    
    }
    public function sendmessage($body,$ids)
    {
        $content = array(
        "en" => $body
        );
        
        $header = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "963c6d5d-e9c2-448c-a9cc-9074edd06842",
        'include_player_ids' => array($ids),
        'android_channel_id'=>"c44de74c-20b1-4d25-99a0-d30e85e39bd5",
        "headings" => $header,
        'content_available' => true,
        'contents' => $content,
        
    );

    $fields = json_encode($fields);
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    $response = curl_exec($ch);
    curl_close($ch);
    
    
            $contents = array(
        "en" => $body
        );
        
        $headers = array(
        "en" => "اسنان بلس"
        );
        
        

    $fields = array(
        'app_id' => "a3fa62d9-19d7-4742-8921-ae678a15d041",
        'include_player_ids' => array($ids),

        "headings" => $headers,
        'content_available' => true,
        'contents' => $contents,
        
    );

    $fields = json_encode($fields);
   
    $chs = curl_init();
    curl_setopt($chs, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    curl_setopt($chs, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8'));
    curl_setopt($chs, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($chs, CURLOPT_HEADER, FALSE);
    curl_setopt($chs, CURLOPT_POST, TRUE);
    curl_setopt($chs, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($chs, CURLOPT_SSL_VERIFYPEER, FALSE);

    $responses = curl_exec($chs);
    curl_close($chs);
    
    
    
    }
    
    

    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id');
    }
}
