<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckBanned
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->banned_until && now()->lessThan(Auth::user()->banned_until)) {
            $banned_days = now()->diffInDays(Auth::user()->banned_until);
            Auth::logout();

            if ($banned_days) {
                $message = 'Your account has been suspended for '.$banned_days.' '.Str::plural('day', $banned_days).'. Please contact administrator.';
            }

            return redirect()->route('login')->withMessage($message);
        }
        return $next($request);
    }
}
