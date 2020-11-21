<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Customs\Facades\Authentication;
use App\Http\Customs\Facades\UserIdentification;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.login');
    }

    public function attempt(Request $request)
    {
        $auth = new Authentication;

        if($user = $auth->attempt($request->email,$request->password)) {
            $request->session()->put('user', $user);

            $UID = new UserIdentification($user->id);
            $route = $UID->getRoute();

            return redirect($route);
        }

        $errors = ['Email or Password is incorrect'];

        session()->flash('error', $errors);

        return redirect(URL::previous());
    }
}
