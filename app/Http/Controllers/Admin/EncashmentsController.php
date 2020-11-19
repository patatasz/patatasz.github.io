<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Models\Encashments;
use Illuminate\Support\Facades\URL;

class EncashmentsController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->status != '' ? $request->status : 'pending';

        $response = [];

        $stat = $this->initStatus($status);

        $response['users']  = Users::where('is_activated', Users::ACTIVATED)->where('account_type', Users::TYPE_USERS)
            ->whereHas('encashments', function ($q) use ($stat) {
                $q->where('status', $stat);
            })
            ->with(['encashments' => function ($q) use ($stat) {
                $q->where('status', $stat);
            }])
            ->get();
        $response['status'] = $status;

        return view('pages.admin.encashments', $response);
    }

    public function process(Request $request)
    {
        $eid    = $request->eid;
        $status = $request->status;

        $stat = $this->initStatus($status);

        Encashments::where('id', $eid)->update([
            'status' => $stat
        ]);

        return redirect(URL::previous());
    }

    private function initStatus($status)
    {
        switch ($status) {
            case 'processing':
                $stat = Encashments::STATUS_PROCESSING;
                break;
            case 'failed':
                $stat = Encashments::STATUS_FAILED;
                break;
            case 'completed':
                $stat = Encashments::STATUS_COMPLETED;
                break;
            default:
                $stat = Encashments::STATUS_PENDING;
                break;
        }

        return $stat;
    }
}
