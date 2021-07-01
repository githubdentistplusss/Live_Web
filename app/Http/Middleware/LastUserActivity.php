<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Cache;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Dentist;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     
      if($request->api_token){
            $expiresAt = Carbon::now()->addSeconds(10);
        
       		$user = User::where('api_token', $request->api_token)->first();
        	if(!$user)
            $user = Dentist::where('api_token', $request->api_token)->first();
            
            if($user)
            Cache::put('user-is-online-'.$user->id,true, $expiresAt);
        }
        return $next($request);
    }
}
