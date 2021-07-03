<?php

namespace App\Services;

/**
 * Class SafetyInfoService
 * @package App\Services
 */

use App\Models\User;
use App\Models\SafetyInfo;
use App\Models\QRData;

class SafetyInfoService
{
    public function setSafetyInfo($data){
        if(SafetyInfo::where('user_id', $data['user_id'])->exists()){
            $response = 'already exists';
            return $response;
        }
        
        if(!QRData::where('qr_id', $data['qr_id'])->exists()){
            $response = 'invalid qr data';
            return $reponse;
        }
        
        $qr = QRData::where('qr_id', $data['qr_id'])->first();
        $safety_info = array(
            'user_id' => $data['user_id'],
            'qr_id' => $qr->id
        );
        SafetyInfo::create($safety_info);
        
        return $safety_info;
    }
}
