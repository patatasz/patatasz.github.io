<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\Transactions;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ? $request->status : 'activated';

        $filters = new \stdClass();
        $filters->status = $status;

        $users = new Users();

        $users = $this->filterStatus($users, $filters);
        $users = $this->getIncomes($users);

        $response = [];

        $paginate = 15;

        if($request->page > 1) {
            $count = $users->count() - ($paginate * (intval($request->page) - 1));
        } else {
            $count = $users->count();
        }

        $response['count'] = $count;
        $response['users'] = $users->orderBy('created_at','desc')->with('activationRequests')->paginate($paginate);
        $response['status'] = $status;

        return view('pages.admin.users', $response);
    }

    private function getIncomes($users)
    {
        $users = $users->with('incomes');

        return $users;
    }

    private function filterStatus($users, $filters)
    {
        $status = 0;

        switch ($filters->status) {
            case 'activated':
                $status = Users::ACTIVATED;
                break;
            case 'deactivated':
                $status = Users::DEACTIVATED;
                break;
        }

        return $users->where('is_activated', $status);
    }

    public function deactivateUser(Request $request)
    {
        Users::where('id', $request->uid)->update([
           'is_activated' => Users::DEACTIVATED
        ]);

        return redirect(URL::previous());
    }

    public function reactivateUser(Request $request)
    {
        Users::where('id', $request->uid)->update([
            'is_activated' => Users::ACTIVATED
        ]);

        return redirect(URL::previous());
    }

    public function editBalance(Request $request)
    {
        $uid = $request->uid;
        $adjustment = $request->adjusted_balance;

        $transaction            = new Transactions();
        $transaction->users_id  = $uid;
        $transaction->type_id   = Transactions::TYPE_CAPTCHA;
        $transaction->status_id = Transactions::STATUS_COMPLETED;
        $transaction->value     = $adjustment;
        $transaction->save();

        return redirect(URL::previous());
    }
}
