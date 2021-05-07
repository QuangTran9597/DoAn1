<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CheckLogin
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
        //phân quyền user
        if(Auth::check())
        {
            $user = Auth::user();
            if($user->quyen=='user') {
                return $next($request);

            } else {
                return redirect()->route('login');
            }
        } else {
            return redirect()->route('login');
        }

    }
}
