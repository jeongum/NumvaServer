<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\MemoService;
use App\Models\StoredMemo;

class MemoAPIController extends Controller
{
    function setCurrentMemo(Request $request){
        $data = $request->all();
        $user = $request->user()->id;
        
        $memo_service = new MemoService();
        
        if($data['type'] == 0){
            $memo = StoredMemo::find($data['memo_id'])->memo;
        } else $memo = $data['memo'];
        
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
    
    function storeMemo(Request $request){
        $data = $request->all();
        $user = $request->user()->id;
        
        $memo_service = new MemoService();
        
        if($memo_service->storeMemo($data['memo'], $user)){
            return response()->json([
                "memo" => $data['memo'],
                "isSuccess" => true,
                "code" => 200,
                "message" => "메모 저장 성공"
            ]);
        }
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "메모 한도 초과"
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
    
    function getStoredMemo(Request $request){
        $memo_service = new MemoService();
        $memos = $memo_service->getStoredMemo($request->user()->id);
        if($memos != null){
            return response()->json([
                "memo" => $memos,
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
    
    function updateStoredMemo(Request $request){
        $memo_service = new MemoService();
        $memo = $memo_service->updateStoredMemo($request->all());
        if($memo != null){
            return response()->json([
                "memo" => $memo,
                "isSuccess" => true,
                "code" => 200,
                "message" => "메모 업데이트 성공"
            ]);
        }
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "데이터가 올바르지 않음"
        ]);
    }
    
    function deleteStoredMemo(Request $request){
        $memo_service = new MemoService();
        if($memo_service->deleteStoredMemo($request->all())){
            return response()->json([
                "isSuccess" => true,
                "code" => 200,
                "message" => "메모 삭제 성공"
            ]);
        }
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "데이터가 올바르지 않음"
        ]);
    }
}
