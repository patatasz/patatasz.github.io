<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\Facades\UsersHelper;

class SetUserInfo
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
            $uh = new UsersHelper();
            $info = new \stdClass();

            $info->total_income = $uh->totalIncome();
            $info->money_balance = $uh->moneyBalance();
            $info->reward_points = $uh->rewardPoints();

            session()->put('user_info', $info);
        }

        return $next($request);
    }
}
