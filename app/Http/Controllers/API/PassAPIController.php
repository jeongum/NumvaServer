<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PassAPIController extends Controller
{
    public function getInfo(Request $request){
        $get_token = Http::post( "https://api.iamport.kr/users/getToken", [
            'imp_key' => '6059102519424712',
            'imp_secret' => '70fc78a79e4f87028a5308795ec4bd104cf04d957e976509b6b754f2d1e20e687dba4227839bed14',
        ]);
        
        $auth_token = $get_token['response']['access_token'];

        $get_user =  Http::withHeaders([
            'Authorization' => $auth_token
        ])->get("https://api.iamport.kr/certifications/".$request['imp_uid']);
       
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "요청 성공",
            "result" => $get_user['response']
        ]);
    }
}
