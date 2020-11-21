<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;

class ValidateEncashment
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
        $uid = session()->get('user')->id;

        $usersModel = new Users;

        $availableIncome = $usersModel->getTotalIncome() - $usersModel->getPendingEncashment();

        if($availableIncome < 300) {
            session()->flash('available_income_not_enough');

            return redirect('/encashment');
        }

        return $next($request);
    }
}
