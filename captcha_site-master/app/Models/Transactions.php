<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Transactions extends Model
{

    protected $table = 'transactions';
    protected $types = 'transaction_types';
    protected $statuses = 'transaction_statuses';

    public const TYPE_CAPTCHA = 1;
    public const TYPE_ENCASHMENT = 2;
    public const TYPE_REFERRAL_BONUS_REWARD = 3;
    public const TYPE_REFERRAL_BONUS_MONEY = 4;

    public const STATUS_PENDING = 1;
    public const STATUS_REJECTED = 2;
    public const STATUS_COMPLETED = 3;

    public function getTypes()
    {
        return DB::table($this->types)->get();
    }

    public function getStatuses()
    {
        return DB::table($this->statuses)->get();
    }
}
