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
use App\Models\SafetyNumber;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\VirtualNumberAPIController;

class SafetyInfoService
{
    protected $virtualNumberCont;
    
    public function __construct(){
        $this->virtualNumberCont = new VirtualNumberAPIController();
    }
    
    public function setSafetyInfo($data){
        if(($qr=QRData::where('qr_id', $data['qr_id'])->first())==null) return '103';
        if($qr->is_allot == 'Y') return '102';
        $qr->is_allot = 'Y';
        $sn = SafetyNumber::where('is_allot', 'N')->first();
        $sn->is_allot = 'Y';
        $user = User::find($data['user_id']);
        $this->virtualNumberCont->setVN(str_replace("-","",$sn->number),$user->phone);
        $response = array(
            'user_id' => $data['user_id'],
            'qr_id' => $qr->id,
            'name' => $data['qr_id'],
            'sn_id' => $sn->id
        );
        SafetyInfo::create($response);
        $qr->save();
        $sn->save();
        
        $si = SafetyInfo::where('user_id', $user->id)->get();
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
    
    public function getSafetyInfoFromQR($qr_id){
        if(($qr=QRData::where('qr_id', $qr_id)->first())==null) return '103';
        if(is_null($qr->safety_info)) return '701';
        $safety_info = [
            'user_id' => $qr->safety_info->user_id,
            'nickname'=>$qr->safety_info->user->nickname,
            'memo'=>isset($qr->safety_info->memo)?$qr->safety_info->memo->memo:null,
            'safetyNumber' => [
                'first' => $qr->safety_info->safety_number->number,
                'second' => $qr->safety_info->safety_number->number
            ]
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
    public function deleteSI($sid){
        $si = SafetyInfo::find($sid);
        if($si == null) return '103';
        if(($qr = QRData::find($si->qr_id)) == null) return '103';
        if(!is_null($si->memo_id) && ($memo = QR::find($si->memo_id)) == null) return '103';
        if(($sn = SafetyNumber::find($si->sn_id)) == null) return '103';
        
        
        $qr->is_allot = 'N';
        $sn->is_allot = 'N';
        
        $si->delete();
        $qr->save();
        $sn->save();
        $this->virtualNumberCont->setVN(str_replace("-","",$sn->number),null);
        return ;
    }
}
