<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FAQService;


class FAQAPIController extends Controller
{
    public  $faq_service ;
    
    public function __construct()
    {
        $this->faq_service = new FAQService();
    }
    
    public function getAllFAQ(){
        $faqs = $this->faq_service->getAll();
        return $this->Success($faqs);
    }
    
    public function getFAQ(Request $request){
        if(is_null($request->faq_id)) return $this->NoParam();
        $faq = $this->faq_service->get($request->faq_id);
        return $this->Success($faq);
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
    
    public function Success($result){
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => is_null($result)?null:$result
        ]);
    }
}
