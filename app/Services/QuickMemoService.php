<?php

namespace App\Services;

/**
 * Class QuickMemoService
 * @package App\Services
 */

use App\Models\User;
use App\Models\QuickMemo;
use Illuminate\Support\Facades\Auth;
class QuickMemoService
{
    public function getQuickMemo(){
        $user = Auth::user()->id;
        return QuickMemo::select('id','memo')->where('user_id', $user)->get();
    }
    public function setQuickMemo($data){
        if((QuickMemo::where('user_id', $data['user_id'])->count()) == 5) return '601';
        QuickMemo::create($data);
        $result = QuickMemo::where('user_id',$data['user_id'])->get();
        return $result;
    }
    
    public function deleteQuickMemo($id){
        $target = QuickMemo::find($id);
        if(is_null($target)) return '103';
        $target->delete();
        return '200';
    }
    
    public function updateQuickMemo($data){
        $target = QuickMemo::find($data['id']);
        if(is_null($target)) return '103';
        $target->memo = $data['memo'];
        $target->save();
        return '200';
    }
}
