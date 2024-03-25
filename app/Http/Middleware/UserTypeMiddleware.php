<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {
            if (Auth::user()->isAdmin()) {
                if ($request->is('admin/*')) {
                    return $next($request);
                }
                return redirect()->route('admin.dashboard');
            } else {
                if ($request->is('user/*')) {
                    return $next($request);
                }
                return redirect()->route('user.dashboard');
            }
        }else{
            return redirect()->route('login');
        }

    }

}
