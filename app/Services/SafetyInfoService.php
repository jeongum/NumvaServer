<?php

namespace App\Services;

/**
 * Class SafetyInfoService
 * @package App\Services
 */

use App\Models\User;
use App\Models\SafetyInfo;
use App\Models\QRData;
use App\Models\Memo;
use Illuminate\Support\Facades\Auth;

class SafetyInfoService
{
    public function setSafetyInfo($data){
        if(($qr=QRData::where('qr_id', $data['qr_id'])->first())==null) return '103';
        if($qr->is_allot == 'Y') return '102';
        $qr->is_allot = 'Y';
        $qr->save();
        
        $response = array(
            'user_id' => $data['user_id'],
            'qr_id' => $qr->id,
            'name' => $data['qr_id']
        );
        $si = SafetyInfo::create($response);
        return $si;
    }
    
    public function getSafetyInfoFromQR($qr_id){
        if(($qr=QRData::where('qr_id', $qr_id)->first())==null) return '103';
        $safety_info = [
            'user'=>$qr->safety_info->user,
            'memo'=>$qr->safety_info->memo,
            'second_phone' => $qr->safety_info->user->rep_second_phone
        ];
        return $safety_info;
    }
    
    public function getSafetyInfo($user_id){
        if(($si=SafetyInfo::where('user_id', $user_id)->get())==null){
            return $si;
        }
        $safety_info = [];
        $idx = 0;
        foreach($si as $item){
            $safety_info[$idx++] = [
                'id' => $item->id,
                'name' => $item->name,                
                'memo' => isset($item->memo)?$item->memo->memo : null,
                'safety_number'=> isset($item->safety_number)?$item->safety_number->number : null
            ];
        }
        return $safety_info;
    }
    
    public function setSIName($sid, $name){
        $si = SafetyInfo::find($sid);
        if($si == null) return '103';
        if($si->user_id != Auth::user()->id) return '103';
        $si->name = $name;
        $si->save();
        return $si;
    }
}
