<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifyEmail
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
        $user = User::query()->where('email', $request->input('email'))->first();

        if ( $user && $user->email_verified_at !== null) {
            return $next($request);
        }

        return back()->with('message', 'Bạn chưa đủ điều kiện đăng nhập!');
    }
}
