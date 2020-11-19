<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Customs\Facades\ForgotPassword;
use App\Models\ForgotPassword as ForgotPasswordModel;
use Illuminate\Support\Facades\Hash;
use App\Models\Users;

class ForgotPasswordController extends Controller
{

    public function index(Request $request)
    {
        return view('pages.forgot-password');
    }

    public function forgotPassword(Request $request)
    {

        $forgotPass = new ForgotPassword;

        $result = $forgotPass->attempt($request->email);

        $response = [];

        if ( ! $result) {
            $error              = ['Email does not exist'];
            $response['errors'] = $error;

            return view('pages.forgot-password', $response);
        }

        return view('pages.thankyou.forgot-password');
    }

    public function updatePassIndex(Request $request, $token)
    {

        $result = ForgotPasswordModel::where('slug', $token)->get();

        if (count($result) > 0) {
            $uid = $result[0]->user_id;

            $response =[];
            $response['token'] = urldecode($token);
            return view('pages.update-password', $response);
        }

        return view('pages.errors.something-went-wrong');
    }

    public function updatePass(Request $request)
    {
        $this->validate($request, [
             'password' => 'required|confirmed|min:6'
        ]);

        $token = urldecode($request->token);
        $result = ForgotPasswordModel::where('slug', $token)->get();

        if (count($result) > 0) {
            $uid = $result[0]->user_id;

            Users::where('id', $uid)->update([
                'password' => Hash::make($request->password)
            ]);

            return view('pages.thankyou.update-password');
        }

        return view('pages.errors.something-went-wrong');
    }

}
