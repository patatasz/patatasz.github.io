<?php

namespace App\Http\Customs\Facades;

use App\Models\Users;

class UserIdentification
{
    private $user_type;

    public function __construct($userId)
    {
        $user = Users::select('account_types.name as account_type_name')
            ->where('users.id', $userId)
            ->join('account_types','users.account_type','=','account_types.id')
            ->first();

        $this->user_type = $user->account_type_name;
    }

    public function identify()
    {
        return $this->user_type;
    }

    public function getRoute()
    {
        switch ($this->user_type) {
            case 'admin':
                $route = '/dashboard';
                break;
            default:
                $route = '/';
                break;
        }

        return $route;
    }
}