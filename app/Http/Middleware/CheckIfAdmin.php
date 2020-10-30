<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;


class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if( Auth::check() )
        {
            // if user is not admin take him to his dashboard
            // if ( Auth::user()->isUser() ) {
            //      return redirect(route('home'));
            // }

            // allow admin to proceed with request
             if ( Auth::user()->isAdmin() ) {
                 
                return $next($request);
            }
            
            abort(403);

           
        }

     
            
        
    }
}
