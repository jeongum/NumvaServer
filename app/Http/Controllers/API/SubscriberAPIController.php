<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Subscriber;

class SubscriberAPIController extends Controller
{
    public function register(Request $request)    {   
        if (User::where('id', $request->user_id)->exists()) {
            $user = User::find($request->user_id);
            $subscriber = new Subscriber;
            
            $subscriber->started_at = Carbon::now();
            $subscriber->status = 1;
            $subscriber->user_id = $user->id;
            $subscriber->save();
            
            return response($subscriber, 200);
        } else {
            return response()->json([
                "message" => "회원정보가 유효하지 않습니다."
            ], 404);
        }
    }

    public function Unsubscribe(Request $request)    {
        if (Subscriber::where('id', $request->subscriber_id)->exists()) {
            
            $subscriber = Subscriber::find($request->subscriber_id);
            
            $subscriber->ended_at = Carbon::now();
            $subscriber->status = 0;
            $subscriber->save();
            
            return response($subscriber, 200);
        } else {
            return response()->json([
                "message" => "회원정보가 유효하지 않습니다."
            ], 404);
        }
    }

}
