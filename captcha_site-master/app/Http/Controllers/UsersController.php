<?php

namespace App\Http\Controllers;

use App\Models\RewardClaimRequests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Transactions;
use DB;
use App\Models\Encashments;
use App\Models\Users;
use App\Models\Rewards;
use Illuminate\Support\Facades\URL;
use Validator;

class UsersController extends Controller
{

    protected $user;

    public function __construct(Request $request)
    {
        $this->user = session()->get('user');
    }

    public function typeCaptchaIndex(Request $request)
    {
        $response = [];

        $usersModel = new Users;

        $response['total_captcha']  = $usersModel->getTotalCaptcha();
        $response['total_earnings'] = $usersModel->getTotalIncome();
        $response['today_captcha']  = $usersModel->getTodaysCaptcha();
        $response['today_earnings'] = $usersModel->getTodaysEarning();

        return view('pages.users.type-captcha', $response);
    }

    public function referralsIndex(Request $request)
    {
        $response              = [];
        $response['referrals'] = Transactions::where('users_id', session()->get('user')->id)->whereIn('type_id', [Transactions::TYPE_REFERRAL_BONUS_REWARD, Transactions::TYPE_REFERRAL_BONUS_MONEY])->orderBy('created_at', 'desc')->paginate(15);

        return view('pages.users.referral-list', $response);
    }

    public function typeCaptcha(Request $request)
    {
        sleep(5);

        $validator = Validator::make($request->all(), [
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return redirect('/typing-captcha#captchaBox')
                ->withErrors($validator)
                ->withInput();
        }

//        $this->validate($request, [
//            'captcha' => 'required|captcha'
//        ]);

        $transaction            = new Transactions();
        $transaction->users_id  = $request->session()->get('user')->id;
        $transaction->type_id   = 1;
        $transaction->status_id = 3;
        $transaction->value     = 0.03;
        $transaction->save();

        $request->session()->flash('success', true);

        return redirect('/typing-captcha#captchaBox');
    }

    public function encashmentIndex(Request $request)
    {
        return view('pages.users.encashment');
    }

    public function encashGcashIndex(Request $request)
    {
        return view('pages.payment-forms.gcash');
    }

    public function encashPalawanIndex(Request $request)
    {
        return view('pages.payment-forms.palawan');
    }

    public function encashCoinsphIndex(Request $request)
    {
        return view('pages.payment-forms.coinsph');
    }

    public function encashMlhuillierIndex(Request $request)
    {
        return view('pages.payment-forms.mlhuillier');
    }

    public function encash(Request $request)
    {
        $this->validate($request,
            [
                'amount' => 'integer|min:300'
            ],
            [
                'amount.min' => 'The minimum required amount is 300.00 PHP'
            ]);

        session()->flash('encashment_request_submitted', true);

        $encash = new Encashments();

        $encash->users_id               = session()->get('user')->id;
        $encash->payment_option         = $request->payment_option;
        $encash->amount                 = $request->amount;
        $encash->full_name              = $request->full_name;
        $encash->address                = $request->address;
        $encash->mobile_number          = $request->mobile_number;
        $encash->coinsph_wallet_address = $request->coinsph_address;
        $encash->save();

        return redirect('/encashment');
    }

    public function rewardsIndex(Request $request)
    {
        $rewards = Rewards::where('is_published', Rewards::PUBLISHED)->paginate(15);

        $response            = [];
        $response['rewards'] = $rewards;

        return view('pages.users.rewards', $response);
    }

    public function checkoutIndex(Request $request, $rid)
    {
        $reward = Rewards::find($rid);

        $response = [];

        $response['reward'] = $reward;

        return view('pages.users.rewards-checkout', $response);
    }

    public function rewardClaim(Request $request)
    {
        $this->validate($request, [
            'delivery_address' => 'required',
            'mobile_number'    => 'required',
            'payment_option'   => 'required'
        ]);

        $reward = Rewards::find($request->rid);

        $proceed = false;

        switch (intval($request->payment_option)) {
            case RewardClaimRequests::PAYMENT_OPTION_REWARD :
                if (session('user_info')->reward_points >= $reward->price_reward_points)
                    $proceed = true;
                break;
            case RewardClaimRequests::PAYMENT_OPTION_MONEY :
                if (session('user_info')->money_balance >= $reward->price_money_balance)
                    $proceed = true;
                break;
        }

        if ( ! $proceed) {
            session()->flash('CLAIM_REWARD_FAIL', true);
            return redirect(URL::previous());
        }

        $rcr                   = new RewardClaimRequests;
        $rcr->users_id         = session()->get('user')->id;
        $rcr->reward_id        = $request->rid;
        $rcr->delivery_address = $request->delivery_address;
        $rcr->mobile_number    = $request->mobile_number;
        $rcr->notes            = $request->notes;
        $rcr->payment_option   = $request->payment_option;
        $rcr->save();

        return view('pages.thankyou.reward-claim');
    }
}
