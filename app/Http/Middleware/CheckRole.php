<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // in_array = helper from laravel and many roles
        if (in_array($request->user()->role, $roles)) {
            // dd($request->user()->role);
            return $next($request);
        }
        return redirect('/'); //redirect to the route
    }
}
