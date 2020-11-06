<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Carbon\Carbon;
use Closure;

class LoginCheck
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
            if(Auth::check()) {
                $expiresAt = Carbon::now()->addMinutes(2);
                Cache::put('userOnline'. Auth::user()->id,true,$expiresAt);
            }
        return $next($request);
    }
}
