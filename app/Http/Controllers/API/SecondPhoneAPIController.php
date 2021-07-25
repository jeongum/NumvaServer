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
        
        if($result == 'doesnt exist'){
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "저장된 정보 없음"
            ]);
        }
        return response()->json([
            "data" => $result,
            "isSuccess" => true,
            "code" => 200,
            "message" => "2차전화번호  가져오기 성공"
        ]);
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
                "code" => 400,
                "message" => "최대 저장개수 초과"
            ]);
        }
        return response()->json([
            "data" => $data,
            "isSuccess" => true,
            "code" => 200,
            "message" => "2차전화번호 등록 성공"
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
                "code" => 400,
                "message" => "유효하지 않은 ID"
            ]);
        }
        return response()->json([
            "data" => $result,
            "isSuccess" => true,
            "code" => 200,
            "message" => "2차전화번호 삭제 성공"
        ]);
    }
    
    public function setRep(Request $request){
        $data = array(
            'user_id' => $request->user()->id,
            'second_phone_id' => $request->second_phone_id
        );
        $result = $this->second_phone_service->setRep($data);
        return response()->json([
            "data" => $result,
            "isSuccess" => true,
            "code" => 200,
            "message" => "대표 2차전화번호 설정 성공"
        ]);
    }
}
