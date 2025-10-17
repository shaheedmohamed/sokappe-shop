<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->is_admin) {
            // If admin is trying to access regular pages, redirect to admin dashboard
            if (!$request->is('admin*') && !$request->is('logout')) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
