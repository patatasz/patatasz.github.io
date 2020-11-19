<?php

namespace App\Http\Middleware;

use Closure;

class AdminConfig
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request->session()->put('admin_sidebar', config('admin.sidebar'));

        return $next($request);
    }
}
