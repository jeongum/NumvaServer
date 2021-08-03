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
    public function setMemo($data, $user_id){
        $safety_info = SafetyInfo::find($data['safety_info_id']);
        if($safety_info == null || $safety_info->user_id != $user_id) return 'Invalid Data';
        if($safety_info->memo_id != null){
            $memo = $safety_info->memo;
            $memo->memo = $data['memo'];
            $memo->save();
        }
        else $memo = Memo::create($data);
        $safety_info->memo_id = $memo->id;
        $safety_info->save();
        return $memo;
    }
    
    public function getMemo($data, $user_id){
        $safety_info = SafetyInfo::find($data);
        if($safety_info == null || $safety_info->user_id != $user_id) return 'Invalid Data';
        return $safety_info -> memo;
    }
    
}
