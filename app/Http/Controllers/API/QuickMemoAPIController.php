<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\QuickMemoService;

class QuickMemoAPIController extends Controller
{
    public  $quick_memo_service ;
    
    public function __construct()
    {
        $this->quick_memo_service = new QuickMemoService();
    }
    public function getQuickMemo(){
        $result = $this->quick_memo_service->getQuickMemo();
        return $this->Success($result);
    }
    public function setQuickMemo(Request $request){
        if(!isset($request->memo)) return $this->NoParam();
        $data = array(
            "memo" => $request->memo,
            "user_id" => $request->user()->id
        );
        $result = $this->quick_memo_service->setQuickMemo($data);
        if($result == '601') return $this->OverMax();
        return $this->Success($result);
    }
    
    public function deleteQuickMemo(Request $request){
        if(!isset($request->quickmemo_id)) return $this->NoParam();
        $result = $this->quick_memo_service->deleteQuickMemo($request->quickmemo_id);
        if($result == '103') return $this->NoMatchedData();
        return $this->Success(null);
    }

    public function updateQuickMemo(Request $request){
        if(!isset($request->quickmemo_id) || !isset($request->memo)) return $this->NoParam();
        $data = array(
            "id" => $request->quickmemo_id,
            "memo" => $request->memo
        );
        $result = $this->quick_memo_service->updateQuickMemo($data);
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
    
    public function OverMax(){
        return response()->json([
            "isSuccess" => false,
            "code" => -601,
            "message" => "최대 저장개수 초과"
        ],400);
    }
}
