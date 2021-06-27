<?php

namespace App\Services;

/**
 * Class MemoService
 * @package App\Services
 */

use App\Models\User;
use App\Models\CurrentMemo;
use App\Models\StoredMemo;

class MemoService
{
    public function setCurrentMemo($memo, $user_id){
        if(CurrentMemo::where('user_id', $user_id)->exists()){
            $cur_memo = CurrentMemo::where('user_id', $user_id) ->first();
            $cur_memo -> memo = $memo;
            $cur_memo -> save();
            return true;
        }
        $data = array(
            'user_id' => $user_id,
            'memo' => $memo
        );
        CurrentMemo::create($data);
        return true;
    }
    
    public function storeMemo($memo, $user_id){
        if(StoredMemo::where('user_id', $user_id)->count() >= 10){
            return false;
        }
        $data = array(
            'user_id' => $user_id,
            'memo' => $memo
        );
        StoredMemo::create($data);
        return true;
    }
    
    public function getCurrentMemo($user_id){
        if(CurrentMemo::where('user_id', $user_id)->exists()){
            $cur_memo = CurrentMemo::where('user_id', $user_id) ->first();
            return $cur_memo;
        }
        return null;
    }
    
    public function getStoredMemo($user_id){
        if(StoredMemo::where('user_id', $user_id)->exists()){
            $memos = StoredMemo::where('user_id', $user_id)->get();
            return $memos;
        }
        return null;
    }
    
    public function updateStoredMemo($data){
        $memo = StoredMemo::find($data['memo_id']);
        if($memo != null){
            $memo->memo = $data['memo'];
            $memo->save();
            return $memo;
        }
        return null;
    }
    
    public function deleteStoredMemo($data){
        $memo = StoredMemo::find($data['memo_id']);
        if($memo != null){
            $memo->delete();
            return true;
        }
        return false;
    }
}
