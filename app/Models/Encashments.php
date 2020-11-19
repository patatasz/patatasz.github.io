<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Encashments extends Model
{

    protected $table = 'encashments';

    public const STATUS_PENDING = 0;
    public const STATUS_PROCESSING = 1;
    public const STATUS_FAILED = 2;
    public const STATUS_COMPLETED = 3;

    public function getTotalEncashments($uid = null)
    {
        $userId = $uid ? $uid : session()->get('user')->id;

        $result = DB::table($this->table)->where('users_id', $userId)
            ->where('status', self::STATUS_COMPLETED)
            ->select(DB::raw('sum(amount) as total'))
            ->get();

        return count($result) > 0 ? $result[0]->total : 0 ? $result[0]->total : 0 ;
    }

}
