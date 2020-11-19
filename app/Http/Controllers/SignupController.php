<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;
use Hash;

use App\Models\Users;

class SignupController extends Controller
{

    public function index(Request $request)
    {
        return view('pages.signup');
    }

    public function attempt(Request $request)
    {
        $draft = (object)[];
        $draft->first_name = $request->first_name;
        $draft->last_name = $request->last_name;
        $draft->email = $request->email;

        $request->session()->flash('draft', $draft);

        $referrer = $this->checkIfReferred($request->ref);

        session()->flash('SIGNUP_ERROR', true);

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'password' => 'required|min:6|confirmed'
        ]);

        session()->flash('SIGNUP_ERROR', false);

        $user = new Users;

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($referrer) {
            $user->referred_by = $referrer->id;
        }

        $user->save();

        $request->session()->put('user', $user);

        session()->put('NEW_SIGNUP', true);

        return redirect('/');
    }

    private function checkIfReferred($ref)
    {
        if($ref != '') {
            $email = decrypt(urldecode($ref));

            $result = Users::where('email', $email)->get();

            if(count($result) == 1) {
                return $result[0];
            }
        }

        return false;
    }
}
