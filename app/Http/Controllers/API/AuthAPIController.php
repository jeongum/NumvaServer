<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class AuthAPIController extends Controller
{
    public function authException(){
        return response()->json([
            "isSuccess" => false,
            "code" => -401,
            "message" => "인증실패"
        ],401);
    }
    
    public function register(Request $request) {
        $isdata = false;
        $data = array(
            'name' => isset($request -> name)?$request->name: $isdata = true,
            'email' => isset($request -> email)?$request -> email: $isdata = true,
            'password' => isset($request -> password)?bcrypt($request->password): $isdata = true,
            'phone' => isset($request -> phone)?$request -> phone: $isdata = true,
            'birth' => isset($request -> birth)?$request -> birth: null,
            'nickname' => isset($request -> nickname)?$request -> nickname: $isdata = true
        );
        if($isdata) return $this->NoParam();
        if(User::where([['name',$data['name']], ['phone', $data['phone']], ['birth', $data['birth']]])->exists()) return $this->AlreadyExists();
        
        $user = User::create($data);
        return $this->Success($user);
    }
    
    public function login(Request $request) {
        $isdata = false;
        $loginData = array(
            'email' => isset($request -> email)?$request -> email: $isdata = true,
            'password' =>isset($request -> password)?($request->password): $isdata = true,
        );
        if($isdata) return $this->NoParam();
        if(!auth()->attempt($loginData)) return $this->NoMatchedData();
        
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        
        return $this->Success($accessToken);
    }
        
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return $this->Success($result);
    }
    
    public function checkToken(Request $request){
        $isValid = Auth::guard('api')->check();
        if($isValid) return $this->Success(null);
        return $this->NoMatchedData();
    }
    
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
