<?php

namespace App\Http\Customs\Facades;

use App\Models\Users;
use App\Models\ForgotPassword as ForgotPassModel;
use App\Mail\ForgotPassword as ForgotPassMail;
use Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ForgotPassword
{

    private $email;

    public function attempt($email)
    {
        $user = Users::where('email', $email)->get();

        if (count($user) > 0) {
            $this->email = $email;
            $this->proceed($user);

            return true;
        }

        return false;
    }

    private function proceed($user)
    {
        $fpModel = new ForgotPassModel();

        $fpModel->user_id = $user[0]->id;
        $fpModel->slug    = str_replace('/', '', urldecode(Hash::make(Carbon::now() . $user[0]->email)));
        $fpModel->save();

        $this->sendEmail($user[0], $fpModel->slug);
    }

    private function sendEmail($user, $slug)
    {
        Mail::to($this->email)->send(new ForgotPassMail($user, $slug));
    }
}