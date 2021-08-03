<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MemoService;

class MemoAPIController extends Controller
{
    public  $memo_service ;
    
    public function __construct()
    {
        $this->memo_service = new MemoService();
    }
    
    function setMemo(Request $request){
        $data = $request->all();
        $user = $request->user()->id;
        
        $response = $this->memo_service->setMemo($data, $user);
        if($response !== 'Invalid Data'){
            return response()->json([
                "isSuccess" => true,
                "code" => 200,
                "message" => "요청 성공",
                "result" => $response,
            ]);
        }
        
        return response()->json([
            "isSuccess" => false,
            "code" => -103,
            "message" => "매칭된 데이터 없음"
        ],400);
    }
    
    function getMemo(Request $request){
        $memo = $this->memo_service->getMemo($request->safety_info_id, $request->user()->id);
        if($memo !== 'Invalid Data'){
            return response()->json([
                "isSuccess" => true,
                "code" => 200,
                "message" => "요청 성공",
                "result" => $memo
            ],200);
        }
        return response()->json([
            "isSuccess" => false,
            "code" => -103,
            "message" => "매칭된 데이터 없음"
        ],400);
    }
    
}
