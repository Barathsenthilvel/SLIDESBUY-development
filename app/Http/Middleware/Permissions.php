<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$data)
    {
        // dd($data);
        // dd(Auth::guard('webadmin')->user()->sectionCheck($data));
        if (Auth::guard('webadmin')->check()) {
            if(Auth::guard('webadmin')->user()->id == 1){
                // dd($request);
                return $next($request);
            }
            if (Auth::guard('webadmin')->user()->IsSuper()){
                return $next($request);
            }
            if (Auth::guard('webadmin')->user()->sectionCheck($data)){
                return $next($request);
            }
        }

        return redirect()->back()->with('errors',["Access Denied"]);
    }
}
