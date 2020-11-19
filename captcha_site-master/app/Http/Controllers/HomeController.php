<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Encashments;
use App\Models\RewardClaimRequests;
use App\Models\Rewards;
use Illuminate\Http\Request;
use App\Models\Transactions;
use DB;
use App\Models\Users;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{

    protected $user;

    public function index(Request $request)
    {
        if ($request->session()->has('user')) {
            if (session()->get('user')->is_activated == 1) {
                $this->user = $request->session()->get('user');
                $response   = $this->getIncomeStatistics();

                return view('pages.home', $response);
            }
            return redirect('/activate-account');
        }

        $response            = [];
        $response['action']  = $request->action;
        $response['rewards'] = Rewards::where('is_published', Rewards::PUBLISHED)->orderBy('created_at', 'desc')->limit(10)->get();

        return view('welcome', $response);
    }

    private function getIncomeStatistics()
    {
        $response = [];

        $usersModel      = new Users;
        $encashmentModel = new Encashments;
        $rcr             = new RewardClaimRequests;

        $response['total_income']          = $usersModel->getTotalIncome();
        $response['total_encashment']      = $encashmentModel->getTotalEncashments();
        $response['pending_encashment']    = $usersModel->getPendingEncashment();
        $response['referral_income']       = $usersModel->getReferralIncome();
        $response['captcha_income']        = $usersModel->getCaptchaIncome();
        $response['money_balance']         = $usersModel->getMoneyBalance();
        $response['reward_points']         = $usersModel->getRewardPoints();
        $response['reward_claims']         = $rcr->getTotalCompleted(null, RewardClaimRequests::PAYMENT_OPTION_MONEY) + $rcr->getTotalCompleted(null, RewardClaimRequests::PAYMENT_OPTION_REWARD);
        $response['reward_claims_pending'] = $rcr->getTotalPending(null, RewardClaimRequests::PAYMENT_OPTION_MONEY) + $rcr->getTotalPending(null, RewardClaimRequests::PAYMENT_OPTION_REWARD);
        $response['referral_link']         = URL::to('/') . '?action=signup&ref=' . encrypt($this->user->email);

        return $response;
    }

    public function contactUs(Request $request)
    {
        $this->validate($request, [
            'name'        => 'required',
            'email'       => 'required',
            'description' => 'required'
        ]);

        Mail::to('trihomebased@gmail.com')->send(new ContactUs($request->name, $request->email, $request->description));

        session()->flash('SENT_CONTACTUS', true);

        return redirect(URL::previous());
    }

}
