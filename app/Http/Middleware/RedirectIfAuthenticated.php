<?php

namespace Site\Http\Middleware;

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

        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended('dashboard');
                }
                break;
            case 'customer':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended('login');
                }
                break;
            case 'company':
                if (Auth::guard($guard)->check()) {
                    return redirect()->intended('/empresas/login');
                }
                break;
            default:

                // dd( Auth::guard($guard)->check() );

                // if (Auth::guard($guard)->check()) {
                //     return redirect('/');
                // }
                break;
        }

        return $next($request);
    }
}
