<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SafetyInfoService;

class SafetyInfoAPIController extends Controller
{
    public function setSafetyInfo(Request $request){
        $data = array(
            "qr_id" => $request->qr_id,
            "user_id" => $request->user()->id
        );
        
        $safety_service = new SafetyInfoService();
        
        if($safety_service->setSafetyInfo($data) == 'already exists'){
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "해당 유저의 안심정보가 이미 존재합니다."
            ]);
        }
        else if($safety_service->setSafetyInfo($data) == 'invalid qr data'){
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "올바르지 않은 QR번호입니다."
            ]);
        }
        $safety_info = $safety_service->setSafetyInfo($data);
        return response()->json([
            "data" => $safety_info,
            "isSuccess" => true,
            "code" => 200,
            "message" => "QR 등록 성공"
        ]);
    }
}
