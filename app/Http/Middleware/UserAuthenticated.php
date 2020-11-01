<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserAuthenticated
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
        if( Auth::check() ) {

            // // if user is admin take user admin to his dashboard
            // if ( $request->user()->isAdmin() ) {
            //     return redirect(route('admin'));
            //  }

            // allow user to proceed with request and prevent admin user access to user page
            if ( $request->user()->isUser() ) {
                
                return $next($request);
            }
            
            abort(403);        
        }

    }
}
