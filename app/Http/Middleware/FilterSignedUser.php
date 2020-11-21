<?php

namespace App\Http\Middleware;

use Closure;

class FilterSignedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('user')) {
            if(session()->get('user')->account_type == 2) {
                return redirect('/dashboard');
            }
        }

        return $next($request);
    }
}
