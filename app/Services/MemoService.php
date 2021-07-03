<?php

namespace App\Services;

/**
 * Class MemoService
 * @package App\Services
 */

use App\Models\User;
use App\Models\Memo;

class MemoService
{
    public function setMemo($memo, $user_id){
        if(Memo::where('user_id', $user_id)->exists()){
            $cur_memo = Memo::where('user_id', $user_id) ->first();
            $cur_memo -> memo = $memo;
            $cur_memo -> save();
            return true;
        }
        $data = array(
            'user_id' => $user_id,
            'memo' => $memo
        );
        Memo::create($data);
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
