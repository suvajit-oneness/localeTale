<?php

namespace App\Http\Middleware\Custom;

use Closure, Auth, Session;
use Illuminate\Http\Request;

class Customer
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
        /***** THis Middleware will work for User role Customer or Admin Role ******/
        if(Auth::user() && (Auth::user()->user_role == 3 || Auth::user()->user_role == 1)){
            return $next($request);
        }
        Session::flash('error', 'you are not authorise');
        return redirect('/home');
    }
}
