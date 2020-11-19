<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\ActivationRequestDetails;
use App\Mail\AccountVerified;
use Illuminate\Support\Facades\Mail;
use App\Models\Transactions;

class ActivateAccountController extends Controller
{

    public function index(Request $request, $id)
    {
        $response         = [];
        $response['user'] = Users::find($id);
        $response['apd']  = ActivationRequestDetails::where('users_id', $id)->get();

        return view('pages.admin.activate-account', $response);
    }

    public function apdRequestAction(Request $request)
    {
        switch ($request->action) {
            case 3:
                Users::where('id', $request->uid)->update([
                    'is_activated' => 1
                ]);
                $user = Users::where('id', $request->uid)->first();
                $this->processReferral($user->id);
                $this->sendEmail($user);
                break;
        }

        ActivationRequestDetails::where('users_id', $request->uid)->where('id', $request->apdid)
            ->update([
                'is_accepted' => $request->action
            ]);

        return redirect('/activation-request/' . $request->uid);
    }

    private function processReferral($uid)
    {
        $user = Users::find($uid);

        if ($user) {

            $tr               = new Transactions();
            $tr->users_id     = $user->id;
            $tr->type_id      = Transactions::TYPE_REFERRAL_BONUS_REWARD;
            $tr->status_id    = Transactions::STATUS_COMPLETED;
            $tr->value        = 100;
            $tr->source_token = 'Successful Signup,NA,NA';
            $tr->save();

            $referrer = $user->referred_by;
            for ($i = 0; $i < 5; $i++) {
                if ($referrer) {
                    $transaction            = new Transactions();
                    $transaction->users_id  = $referrer;
                    $transaction->type_id   = Transactions::TYPE_REFERRAL_BONUS_MONEY;
                    $transaction->status_id = Transactions::STATUS_COMPLETED;

                    switch ($i):
                        case 0:
                            $transaction->value        = 40;
                            $transaction->source_token = $user->first_name . ' ' . $user->last_name . ',' . $user->email . ',' . '1st_level';

                            $transaction2               = new Transactions();
                            $transaction2->users_id     = $referrer;
                            $transaction2->value        = 10;
                            $transaction2->type_id      = Transactions::TYPE_REFERRAL_BONUS_REWARD;
                            $transaction2->status_id    = Transactions::STATUS_COMPLETED;
                            $transaction2->source_token = $user->first_name . ' ' . $user->last_name . ',' . $user->email . ',' . '1st_level';
                            $transaction2->save();
                            break;
                        case 1:
                            $transaction->value        = 10;
                            $transaction->source_token = $user->first_name . ' ' . $user->last_name . ',' . $user->email . ',' . '2nd_level';
                            break;
                        case 2:
                            $transaction->value        = 5;
                            $transaction->source_token = $user->first_name . ' ' . $user->last_name . ',' . $user->email . ',' . '3rd_level';
                            break;
                        case 3:
                            $transaction->value        = 2.5;
                            $transaction->source_token = $user->first_name . ' ' . $user->last_name . ',' . $user->email . ',' . '4th_level';
                            break;
                        case 4:
                            $transaction->value        = 2.5;
                            $transaction->source_token = $user->first_name . ' ' . $user->last_name . ',' . $user->email . ',' . '5th_level';
                            break;
                    endswitch;

                    $transaction->save();

                    $nextReferrer = Users::find($referrer);

                    $referrer = $nextReferrer->referred_by;
                }
            }
        }
    }


    private function sendEmail($user)
    {
        Mail::to($user->email)->send(new AccountVerified($user));
    }
}
