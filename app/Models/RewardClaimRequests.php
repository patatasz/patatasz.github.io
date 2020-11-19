<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RewardClaimRequests extends Model
{

    protected $table = 'reward_claim_requests';

    public const PAYMENT_OPTION_REWARD = 1;
    public const PAYMENT_OPTION_MONEY = 2;
    public const STATUS_PENDING = 0;
    public const STATUS_REJECTED = 1;
    public const STATUS_COMPLETED = 2;

    public function getTotalPending($uid = null, $paymentOption)
    {
        $userId = $uid ? $uid : session()->get('user')->id;

        switch ($paymentOption) {
            case RewardClaimRequests::PAYMENT_OPTION_REWARD:
                $rcolumn = 'price_reward_points';
                break;
            case RewardClaimRequests::PAYMENT_OPTION_MONEY:
                $rcolumn = 'price_money_balance';
        }

        $result = DB::table($this->table)->where('status', self::STATUS_PENDING)->where('users_id', $userId)
            ->where('payment_option', $paymentOption)
            ->join('rewards', 'reward_claim_requests.reward_id', '=', 'rewards.id')
            ->select(DB::raw('sum(rewards.' . $rcolumn . ') as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0;
    }

    public function getTotalCompleted($uid = null, $paymentOption)
    {
        $userId = $uid ? $uid : session()->get('user')->id;

        switch ($paymentOption) {
            case RewardClaimRequests::PAYMENT_OPTION_REWARD:
                $rcolumn = 'price_reward_points';
                break;
            case RewardClaimRequests::PAYMENT_OPTION_MONEY:
                $rcolumn = 'price_money_balance';
        }

        $result = DB::table($this->table)->where('status', self::STATUS_COMPLETED)->where('users_id', $userId)
            ->where('payment_option', $paymentOption)
            ->join('rewards', 'reward_claim_requests.reward_id', '=', 'rewards.id')
            ->select(DB::raw('sum(rewards.' . $rcolumn . ') as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0;
    }

    public function getTotal($uid = null, $paymentOption)
    {

        return $this->getTotalCompleted($uid, $paymentOption) + $this->getTotalPending($uid, $paymentOption);
    }

    public function reward()
    {
        return $this->hasOne('\App\Models\Rewards', 'id', 'reward_id');
    }

    public function user()
    {
        return $this->hasOne('\App\Models\Users', 'id', 'users_id');
    }
}
