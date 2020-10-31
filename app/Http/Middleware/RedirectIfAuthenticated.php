<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {
       /*  $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                return redirect(RouteServiceProvider::HOME);
            }
        } */
        
         if( Auth::check() ) {
                
            // if user is not admin take him to his dashboard   
            if ( $request->user()->isUser() ) {
                    return $next($request);
            }
            abort(403);
        }
        
       // return $next($request);
    }
}
