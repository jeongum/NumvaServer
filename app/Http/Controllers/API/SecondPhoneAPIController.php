<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SecondPhoneService;

class SecondPhoneAPIController extends Controller
{
    public  $second_phone_service ;
    
    public function __construct()
    {
        $this->second_phone_service = new SecondPhoneService();
    }
    
    public function getSecondPhone(Request $request){
        $result = $this->second_phone_service->getSecondPhone($request->user()->id);
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => $result,
        ], 200);
    }
    
    public function setSecondPhone(Request $request){
        $data = array(
            'user_id' => $request->user()->id,
            'second_phone' => $request->second_phone
        );
        $response = $this->second_phone_service->setSecondPhone($data);
        if($response == 'overMaximum'){
            return response()->json([
                "isSuccess" => false,
                "code" => -601,
                "message" => "최대 저장개수 초과"
            ],400);
        }
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => $data
        ]);
    }
    
    public function deleteSecondPhone(Request $request){
        $data = array(
            'user_id' => $request->user()->id,
            'second_phone_id' => $request->second_phone_id
        );
        $result = $this->second_phone_service->deleteSecondPhone($data);
        if($result == 'Invalid data'){
            return response()->json([
                "isSuccess" => false,
                "code" => -602,
                "message" => "유효하지 않은 변수값"
            ],400);
        }
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => $result
        ]);
    }
    
    public function setRep(Request $request){
        $data = array(
            'user_id' => $request->user()->id,
            'second_phone_id' => $request->second_phone_id
        );
        $result = $this->second_phone_service->setRep($data);
        if($result == '103'){
            return response()->json([
                "isSuccess" => false,
                "code" => -103,
                "message" => "매칭된 데이터 없음"
            ],400);
        }
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => $result
        ]);
    }
}
