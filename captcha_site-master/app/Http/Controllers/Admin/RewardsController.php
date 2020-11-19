<?php

namespace App\Http\Controllers\Admin;

use App\Models\RewardClaimRequests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rewards;
use Illuminate\Support\Facades\URL;
use Intervention\Image\ImageManagerStatic as Image;

class RewardsController extends Controller
{

    public function index()
    {
        $rewards = Rewards::where('is_published', '!=', Rewards::ARCHIVED)->paginate(15);

        $response            = [];
        $response['rewards'] = $rewards;

        return view('pages.admin.rewards.index', $response);
    }

    public function addIndex(Request $request)
    {

        return view('pages.admin.rewards.add');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'title'          => 'required|unique:rewards',
            'price_money'    => 'required',
            'price_money'    => 'required',
            'featured_image' => 'required'
        ]);

        $filename = '';

        if ($request->has('featured_image')) {
            $image    = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/images/rewards/' . $filename));
            $filename;
        }

        $inputs = new \stdClass();

        $inputs->title        = $request->title;
        $inputs->description  = $request->description;
        $inputs->price_money  = $request->price_money;
        $inputs->price_reward = $request->price_reward;

        session()->flash('inputs', $inputs);

        $reward = new Rewards();

        $reward->added_by            = session()->get('user')->id;
        $reward->title               = $inputs->title;
        $reward->description         = $inputs->description;
        $reward->featured_image_url  = $filename;
        $reward->price_money_balance = $inputs->price_money;
        $reward->price_reward_points = $inputs->price_reward;
        $reward->save();

        session()->flash('add_reward_success', true);

        return redirect('/rewards/add');
    }

    public function publish(Request $request)
    {
        $rid = $request->rid;

        $reward = Rewards::where('id', $rid);

        $reward->update([
            'is_published' => Rewards::PUBLISHED
        ]);

        return redirect(URL::previous());
    }

    public function archiveIndex(Request $request)
    {
        $rewards = Rewards::where('is_published', '=', Rewards::ARCHIVED)->paginate(15);

        $response            = [];
        $response['rewards'] = $rewards;

        return view('pages.admin.rewards.archive', $response);
    }

    public function archive(Request $request)
    {
        $rid = $request->rid;

        $reward = Rewards::where('id', $rid);

        $reward->update([
            'is_published' => Rewards::ARCHIVED
        ]);

        return redirect(URL::previous());
    }

    public function editIndex(Request $request, $rid)
    {
        $response = [];
        $response['rid'] = $rid;
        $response['reward'] = Rewards::where('id', $rid)->first();

        return view('pages.admin.rewards.edit', $response);
    }

    public function edit(Request $request)
    {
        $this->validate($request, [
            'title'          => 'required',
            'price_money'    => 'required',
            'price_money'    => 'required',
        ]);

        $inputs = new \stdClass();

        $inputs->title        = $request->title;
        $inputs->description  = $request->description;
        $inputs->price_money  = $request->price_money;
        $inputs->price_reward = $request->price_reward;

        session()->flash('inputs', $inputs);

        $reward = Rewards::find($request->rid);

        $reward->added_by            = session()->get('user')->id;
        $reward->title               = $inputs->title;
        $reward->description         = $inputs->description;

        $reward->price_money_balance = $inputs->price_money;
        $reward->price_reward_points = $inputs->price_reward;

        if ($request->has('featured_image')) {
            $image    = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/images/rewards/' . $filename));
            $filename;
            $reward->featured_image_url  = $filename;
        } else {
            $reward->featured_image_url  = $request->current_featured_image;
        }

        $reward->update();

        session()->flash('edit_reward_success', true);

        return redirect(URL::previous());
    }

    public function claimRequestsIndex(Request $request)
    {
        $rcr = new RewardClaimRequests;

        $response = [];
        $response['requests'] = $rcr->where('status', RewardClaimRequests::STATUS_PENDING)
            ->orderBy('created_at','desc')
            ->with('user')
            ->with('reward')
            ->paginate(15);

        return view('pages.admin.rewards.claim-requests', $response);
    }

    public function completeCRC(Request $request)
    {
        $rcr = RewardClaimRequests::find($request->rcrid);
        $rcr->status = RewardClaimRequests::STATUS_COMPLETED;
        $rcr->update();

        session()->flash('CLAIM_REQUEST_COMPLETED', true);

        return redirect(URL::previous());
    }

    public function completedCRCIndex()
    {
        $rcr = new RewardClaimRequests;

        $response = [];
        $response['requests'] = $rcr->where('status', RewardClaimRequests::STATUS_COMPLETED)
            ->orderBy('created_at','desc')
            ->with('user')
            ->with('reward')
            ->paginate(15);

        return view('pages.admin.rewards.claim-completed', $response);
    }
}

