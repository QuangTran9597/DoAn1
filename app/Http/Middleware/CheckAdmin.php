<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::check()) {
            $admin = Auth::user();
            if($admin->quyen == 'admin')
            {
                return $next($request);
            } else {
                return redirect()->route('login');
            }
        }

        else
        {
            return redirect()->route('login');
        }
    }
}