<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check() && Auth::user()->hasRole('admin','web')) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->hasRole('agent','web')) {
            return redirect()->route('agent.dashboard');
        } elseif (Auth::guard($guard)->check() && Auth::user()->hasRole('advisor','web')) {
            return redirect()->route('advisor.dashboard');
        } else {
            return $next($request);
        }
    }
}
