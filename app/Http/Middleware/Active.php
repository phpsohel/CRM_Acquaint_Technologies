<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Active
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
        if(Auth::check() && Auth::user()->isActive() && Auth::user()->expire_date > date('Y-m-d')){
            return $next($request);
        }
        
        elseif (Auth::check() && Auth::user()->isActive() && Auth::user()->expire_date <= date('Y-m-d')) {
             return redirect('/expire')->with('message','You Are Expired! Please Contact With Admin to Renew Date.');
        }
        return redirect('/dashboard');
        
    }
}
