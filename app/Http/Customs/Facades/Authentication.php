<?php
namespace App\Http\Customs\Facades;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class Authentication
{
    protected $username;
    protected $password;
    private $username_column = 'email';

    public function attempt($username, $password)
    {
        $user = Users::where($this->username_column, $username)->first();

        if($user) {
            if(Hash::check($password, $user->password)) {
                $user->active_session = session()->getId();
                $user->update();
                return $user;
            }
        }

        return false;
    }

    public function setUsernameReference($columnName)
    {
        $this->username_column = $columnName;
    }
}
