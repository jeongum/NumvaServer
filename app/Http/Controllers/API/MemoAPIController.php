<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MemoService;

class MemoAPIController extends Controller
{
    function setCurrentMemo(Request $request){
        $data = $request->all();
        $user = $request->user()->id;
        
        $memo_service = new MemoService();
        
        $memo = $data['memo'];
        
        if($memo_service->setCurrentMemo($memo, $user)){
            return response()->json([
                "memo" => $memo,
                "isSuccess" => true,
                "code" => 200,
                "message" => "메모 저장 성공"
            ]);
        }
        
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "메모 저장 실패"
        ]);
    }
    
    function getCurrentMemo(Request $request){
        $memo_service = new MemoService();
        $memo = $memo_service->getCurrentMemo($request->user()->id);
        if($memo != null){
            return response()->json([
                "memo" => $memo,
                "isSuccess" => true,
                "code" => 200,
                "message" => "메모 가져오기 성공"
            ]);
        }
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "메모 없음"
        ]);
    }
    
}
