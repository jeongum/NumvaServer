<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SafetyInfoService;

class SafetyInfoAPIController extends Controller
{
    public  $safety_info_service ;
    
    public function __construct()
    {
        $this->safety_info_service = new SafetyInfoService();
    }
    
    public function registerQR(Request $request){
        $data = array(
            "qr_id" => $request->qr_id,
            "user_id" => $request->user()->id
        );
        if($data["qr_id"] == null ) return $this->NoParam();
        $response = $this->safety_info_service->setSafetyInfo($data);
        if($response == '102') return $this->AlreadyExists();
        else if($response == '103') return $this->NoMatchedData();
        return $this->Success($request->user()->safety_info);
    }
    
    public function scanQR(Request $request){
        if($request->qr_id == null) return $this->NoParam();
        $response = $this->safety_info_service->getSafetyInfoFromQR($request->qr_id);
        if($response == '103') return $this->NoMatchedData();
        return $this->Success($response);
    }

    public function getSI(Request $request){
        $result = $this->safety_info_service->getSafetyInfo($request->user()->id);
        return $this->Success($result);   
    }
    
    public function setSIName(Request $request){
        if(is_null($request->name) || is_null($request->safety_info_id)) return $this->NoParam();
        $result = $this->safety_info_service->setSIName($request->safety_info_id, $request->name);
        if($result == '103') return $this->NoMatchedData();
        return $this->Success(null);
    }
    
    /* RETURN RESPONSE */
    public function NoParam(){
        return response()->json([
            "isSuccess" => false,
            "code" => -101,
            "message" => "필수 변수값 없음"
        ], 400);
    }
    
    public function NoMatchedData(){
        return response()->json([
            "isSuccess" => false,
            "code" => -103,
            "message" => "매칭된 데이터 없음"
        ], 400);
    }
    
    public function AlreadyExists(){
        return response()->json([
            "isSuccess" => false,
            "code" => -102,
            "message" => "해당 데이터 존재"
        ],400);
    }
    
    public function Success($result){
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => is_null($result)?null:$result
        ]);
    }
}
