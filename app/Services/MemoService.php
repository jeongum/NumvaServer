<?php

namespace App\Services;

/**
 * Class MemoService
 * @package App\Services
 */

use App\Models\User;
use App\Models\Memo;
use App\Models\SafetyInfo;

class MemoService
{
    public function setMemo($memo, $user_id){
        if(Memo::where('user_id', $user_id)->exists()){
            $cur_memo = Memo::where('user_id', $user_id) ->first();
            $cur_memo -> memo = $memo;
            $cur_memo -> save();
            
            $safety_info = SafetyInfo::where('user_id', $user_id)->first();
            $safety_info -> memo_id = $cur_memo->id;
            $safety_info -> save();
            
            return true;
        }
        $data = array(
            'user_id' => $user_id,
            'memo' => $memo
        );
        $new_memo = Memo::create($data);
        
        $safety_info = SafetyInfo::where('user_id', $user_id)->first();
        $safety_info -> memo_id = $new_memo->id;
        $safety_info -> save();

        return true;
    }
    
    public function getMemo($user_id){
        if(Memo::where('user_id', $user_id)->exists()){
            $cur_memo = Memo::where('user_id', $user_id) ->first();
            return $cur_memo;
        }
        return null;
    }
    
}
