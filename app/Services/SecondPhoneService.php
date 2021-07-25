<?php

namespace App\Services;

/**
 * Class SecondPhoneService
 * @package App\Services
 */


use App\Models\User;
use App\Models\SecondPhone;

class SecondPhoneService
{
    public function getSecondPhone($data){
        if(!SecondPhone::where('user_id', $data)->exists()) return 'doesnt exist';
        return SecondPhone::where('user_id', $data)->get();
    }
    
    public function setSecondPhone($data){
        if(SecondPhone::where('user_id', $data['user_id'])->count() >= 5) return 'overMaximum';
        SecondPhone::create($data);
        return $data;
    }
    
    public function deleteSecondPhone($data){
        $delete_list = explode(' ', $data['second_phone_id']);
        foreach($delete_list as $list){
            $sphone = SecondPhone::find($list);
            if($sphone == null || $sphone->user_id != $data['user_id']) return 'Invalid data';
            $sphone->delete();
        }
        $isexists = (SecondPhone::where('user_id', $data)->exists())?SecondPhone::where('user_id', $data)->get():null;
        return $isexists;
    }
    
    public function setRep($data){
        $sphone_list = SecondPhone::where('user_id', $data['user_id'])->get();
        foreach($sphone_list as $item){
            if($item->id == $data['second_phone_id']) $item->isrep = 'Y';
            else $item->isrep = 'N';
            $item->save();
        }
        $sphone_list = SecondPhone::where('user_id', $data['user_id'])->get();
        return $sphone_list;
    }
}
