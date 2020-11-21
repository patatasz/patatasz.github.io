<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Transactions;
use DB;
use Carbon\Carbon;
use App\Models\Encashments;

class Users extends Model
{

    protected $hidden = ['password'];
    private $user;

    public const PENDING = 0;
    public const ACTIVATED = 1;
    public const DEACTIVATED = 2;

    public const TYPE_USERS = 1;
    public const TYPE_ADMIN = 2;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user = session()->get('user');
    }

    public function activationRequests()
    {
        return $this->hasMany('App\Models\ActivationRequestDetails', 'users_id');
    }

    public function encashments()
    {
        return $this->hasMany('App\Models\Encashments', 'users_id');
    }

    public function incomes()
    {
        return $this->hasMany('App\Models\Transactions', 'users_id');
    }

    public function getTodaysCaptcha()
    {
        return Transactions::where('users_id', session()->get('user')->id)
            ->where('type_id', 1)
            ->where('status_id', 3)
            ->where('value', '>=', 0)
            ->where('created_at', 'like', '%' . date_format(Carbon::now(), 'Y-m-d') . '%')
            ->count();
    }

    public function getTodaysEarning()
    {
        $total = 0;

        $result = Transactions::where('users_id', session()->get('user')->id)
            ->whereIn('type_id', [1, 3])
            ->where('status_id', 3)
            ->where('value', '>=', 0)
            ->select(DB::raw('sum(value) as total'))
            ->where('created_at', 'like', '%' . date_format(Carbon::now(), 'Y-m-d') . '%')
            ->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getTotalCaptcha()
    {
        return Transactions::where('users_id', session()->get('user')->id)->where('type_id', 1)->where('status_id', 3)->count();
    }

    public function getTotalIncome($uid = null)
    {
        $total = 0;

        $userId = $uid ? $uid : $this->user->id;

        $result = Transactions::where('users_id', $userId)->whereIn('type_id', [Transactions::TYPE_CAPTCHA, Transactions::TYPE_REFERRAL_BONUS_MONEY])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getCaptchaIncome($uid = null)
    {
        $total = 0;

        $userId = $uid ? $uid : $this->user->id;

        $result = Transactions::where('users_id', $userId)->whereIn('type_id', [1])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getReferralIncome($uid = null)
    {
        $total = 0;

        $userId = $uid ? $uid : $this->user->id;

        $result = Transactions::where('users_id', $userId)->whereIn('type_id', [Transactions::TYPE_REFERRAL_BONUS_MONEY])->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getTotalEncashment()
    {
        $total = 0;

        $result = Transactions::where('users_id', $this->user->id)->where('type_id', 2)->where('status_id', 3)->select(DB::raw('sum(value) as total'))->get();

        if (count($result) > 0) {
            $total = $result[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getPendingEncashment($uid = null)
    {
        $userId = $uid ? $uid : $this->user->id;
        $total  = 0;

        $encashments = Encashments::where('users_id', $userId)->whereIn('status', [Encashments::STATUS_PENDING, Encashments::STATUS_PROCESSING])->select(DB::raw('sum(amount) as total'))->get();

        if (count($encashments) > 0) {
            $total = $encashments[0]->total;
        }

        return $total ? $total : 0;
    }

    public function getMoneyBalance($uid = null)
    {
        $em     = new Encashments;
        $rcr    = new RewardClaimRequests;
        $userId = $uid ? $uid : $this->user->id;

        return $this->getTotalIncome($userId) - $em->getTotalEncashments($userId) - $this->getPendingEncashment($userId) - $rcr->getTotal($userId, RewardClaimRequests::PAYMENT_OPTION_MONEY);
    }

    public function getRewardPoints($uid = null)
    {
        $rcr    = new RewardClaimRequests;
        $userId = $uid ? $uid : $this->user->id;

        $res = Transactions::where('users_id', $userId)->where('type_id', Transactions::TYPE_REFERRAL_BONUS_REWARD)->select(DB::raw('sum(value) as total'))->first();

        $res = $res ? $res->total : 0 ? $res->total : 0;

        $r = $res - $rcr->getTotal($userId, RewardClaimRequests::PAYMENT_OPTION_REWARD);

        return $r;
    }
}
