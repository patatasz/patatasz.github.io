<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfAccountActivated
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
        if(session()->get('user')->is_activated == 0) {
            return redirect('/activate-account');
        }

        return $next($request);
    }
}
