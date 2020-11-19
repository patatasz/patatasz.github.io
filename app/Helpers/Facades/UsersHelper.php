<?php

namespace App\Helpers\Facades;

use App\Models\Users;
class UsersHelper
{
    private $user;
    private $um;

    public function __construct()
    {
        $this->user = session()->get('user');
        $this->um = new Users;
    }

    public function totalIncome()
    {
        return $this->um->getTotalIncome();
    }

    public function moneyBalance()
    {
        return $this->um->getMoneyBalance();
    }

    public function rewardPoints()
    {
        return  $this->um->getRewardPoints();
    }
}
