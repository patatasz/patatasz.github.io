<?php

namespace App\Http\Middleware;

use App\Models\Users;
use Closure;

class AllowOneLoginPerUser
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
        if (session()->has('user')) {
            $user_session = Users::find(session()->get('user')->id)->active_session;
            if ($user_session != session()->getId()) {
                if(!session()->has('NEW_SIGNUP')) {
                    session()->flush('user');
                    return redirect('/logout');
                }
            }
        }

        return $next($request);
    }
}
