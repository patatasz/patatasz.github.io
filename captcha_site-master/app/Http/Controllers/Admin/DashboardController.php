<?php

namespace App\Http\Controllers\Admin;

use App\Models\Encashments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Transactions;
use DB;

class DashboardController extends Controller
{
    private $um;
    private $em;

    public function __construct()
    {
        $this->um = new Users;
        $this->em = new Encashments;
    }

    public function index(Request $request)
    {
        $response = [];

        $response['users_pending']     = Users::where('is_activated', Users::PENDING)->count();
        $response['users_activated']   = Users::where('is_activated', Users::ACTIVATED)->count();
        $response['users_deactivated'] = Users::where('is_activated', Users::DEACTIVATED)->count();
        $response['users_income']      = count($total = Transactions::where('status_id', Transactions::STATUS_COMPLETED)->select(DB::raw('sum(value) as total'))->get()) > 0 ? $total : 0;
        $response['users_encashments'] = count($total = Encashments::where('status', Encashments::STATUS_PENDING)->select(DB::raw('sum(amount) as total'))->get()) > 0 ? $total : 0;

        return view('pages.admin.dashboard', $response);
    }
}
