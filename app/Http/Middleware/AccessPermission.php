<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;

class AccessPermission
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

        if(Auth::check() && Auth::user()->Role == 1 )
        {
            return $next($request);
        }
        // if (Auth::check() && Auth::user()->Role == 2 )
        // {
        //     return view('welcome');
        // }
        return back();
        
    }

    // public function logout()
    // {
    //     Session::flush();
    //     return Redirect()->route('login.get');
    // }
}
