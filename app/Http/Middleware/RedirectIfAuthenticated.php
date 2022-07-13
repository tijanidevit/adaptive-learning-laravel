<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
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
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (auth()->user()->role == 0) {
                    return redirect()->route('admin.dashboard');
                }
                if (auth()->user()->role == 1) {
                    return redirect()->route('lecturer.dashboard');
                }
                if (auth()->user()->role == 2) {
                    return redirect()->route('student.dashboard');
                }
            }
        }

        return $next($request);
    }
}
