<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\SocialUser;

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
            'nickname' => isset($request -> nickname)?$request -> nickname: $isdata = true,
            'agreement_marketing' => isset($request -> agreement_marketing)?$request -> agreement_marketing: $isdata = true
        );
        if($isdata) return $this->NoParam();
        if(User::where([['name',$data['name']], ['phone', $data['phone']], ['birth', $data['birth']]])->exists()) return $this->AlreadyExists();
        
        $user = User::create($data);
        return $this->Success(null);
    }
    
    public function socialRegister(Request $request){
        $isdata = false;
        $user_data = array(
            'name' => isset($request -> name)?$request->name: $isdata = true,
            'email' => isset($request -> email)?$request -> email: $isdata = true,
            'phone' => isset($request -> phone)?$request -> phone: $isdata = true,
            'birth' => isset($request -> birth)?$request -> birth: null,
            'nickname' => isset($request -> nickname)?$request -> nickname: $isdata = true,
            'agreement_marketing' => isset($request -> agreement_marketing)?$request -> agreement_marketing: $isdata = true
        );
        $social_data = array(
            'provider' => isset($request->provider)?$request->provider:$isdata = true,
            'social_id' => isset($request->social_id)?$request->social_id:$isdata = true,
        );
        if($isdata) return $this->NoParam();
        if(User::where('email',$user_data['email'])->exists()) return $this->AlreadyExists();

        $user = User::create($user_data);
        $social_data['user_id'] = $user->id;
        SocialUser::create($social_data);
        $accessToken = $user->createToken('authToken')->accessToken;
        return $this->Success($accessToken);
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
    
    public function socialLogin(Request $request) {
        $isdata = false;
        $data = array(
            'provider' => isset($request -> provider)?$request -> provider: $isdata = true,
            'social_id' =>isset($request -> social_id)?($request->social_id): $isdata = true,
        );
        if($isdata) return $this->NoParam();
        
        $user = SocialUser::where([['provider',$data['provider']],['social_id',$data['social_id']]])->first()->user;

        $accessToken = $user->createToken('authToken')->accessToken;
        
        return $this->Success($accessToken);
    }
    
    public function linkSocial(Request $request){
        $isdata = false;
        $data = array(
            'provider' => isset($request -> provider)?$request -> provider: $isdata = true,
            'social_id' =>isset($request -> social_id)?($request->social_id): $isdata = true,
            'email' => isset($request -> email)?($request->email):$isdata = true
        );
        
        if($isdata) return $this->NoParam();
        
        $user = User::where('email', $data['email'])->first();
        $socail_user = SocialUser::create([
            'provider' => $data['provider'],
            'social_id' => $data['social_id'],
            'user_id' => $user->id,
        ]);
        
        $accessToken =$user->createToken('authToken')->accessToken;
        return $this->Success($accessToken);
    }
    
    
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return $this->Success(null);
    }
    
    public function checkToken(Request $request){
        $isValid = Auth::guard('api')->check();
        if($isValid) return $this->Success(null);
        return $this->NoMatchedData();
    }
    
    public function delete(Request $request){
        $request->user()->delete();
        return $this->Success(null);
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
