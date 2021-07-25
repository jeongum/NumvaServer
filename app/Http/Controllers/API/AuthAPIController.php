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
            "code" => 400,
            "message" => "인증실패"
        ]);
    }
    
    public function register(Request $request) {
        $data = array(
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => bcrypt($request->password),
            'phone' => $request -> phone,
            'birth' => $request -> birth
        );
        $doesExist = User::where([['name',$data['name']], ['phone', $data['phone']], ['birth', $data['birth']]])->exists();
        if($doesExist){
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "데이터 존재"
            ]);
        }
        $user = User::create($data);
        
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "user" => $user,
            "message" => "회원가입 성공"
        ]);
    }
    
    public function login(Request $request) {
        $loginData = array(
            'email' => $request->email,
            'password' => $request->password
        );
        
        if (!auth()->attempt($loginData)) {
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "로그인 실패"
            ]);
        }
        
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "access_token" => $accessToken,
            "message" => "로그인 성공"
        ]);
    }
        
    public function logout(Request $request) {
        $request->user()->token()->revoke();
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "로그아웃 성공"
        ]);
    }
    
    public function getUser(Request $request) {
        $user = array(
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'email' => $request->user()->email,
            'phone' => $request->user()->phone,
            'second_phone' => Auth::user()->rep_second_phone()->first()->second_phone,
            'birth' => $request->user()->birth,
        );
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "user" => $user,
            "message" => "유저 정보"
        ]);
    }
    
    public function validEmail(Request $request){
        if(User::where('email', $request->email)->exists())
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "데이터 존재"
            ]);
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "사용 가능 이메일"
        ]);
    }
    
    public function findEmail(Request $request){
        $data = $request->all();
        
        if(User::where([['phone',$data['phone']],['name',$data['name']]])->exists()){
            $user = User::where([['phone',$data['phone']],['name',$data['name']]])->first();
            $email = $user->email;
            return response()->json([
                "email" => $email,
                "isSuccess" => true,
                "code" => 200,
                "message" => "이메일찾기"
            ]);
        }
        
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "데이터 없음"
        ]);
    }
    
    public function resetPW(Request $request){
        $data = $request->all();
        
        if (User::where([['email',$data['email']],['phone',$data['phone']]])->exists()) {
            $user = User::where([['email',$data['email']],['phone',$data['phone']]])->first();
                        
            $user -> password = bcrypt($data['new_pw']);
            $tokens = $user->tokens;
            foreach($tokens as $token){
                $token->revoke();
            }
            $user -> save();
            return response()->json([
                "isSuccess" => true,
                "code" => 200,
                "message" => "비밀번호 재설정"
            ]);
            
        } else {
            return response()->json([
                "isSuccess" => false,
                "code" => 400,
                "message" => "데이터 없음"
            ]);
        }
    }
    
    public function checkToken(Request $request){
        $isValid = Auth::guard('api')->check();
        if($isValid) {
            return response()->json([
                "isSuccess" => true,
                "code" => 200,
                "message" => "유효한 토큰"
            ]);
        }
        return response()->json([
            "isSuccess" => false,
            "code" => 400,
            "message" => "유효하지 않은 토큰"
        ]);
    }
    
    public function certPhone(Request $request){
        $sID = "ncp:sms:kr:268949396524:numva"; // 서비스 ID
        $smsURL = "https://sens.apigw.ntruss.com/sms/v2/services/".$sID."/messages";
        $smsUri = "/sms/v2/services/".$sID."/messages";
        $sKey = "47d70b42c3c74a42aeaca4a907968191";
        
        $accKeyId = "ySlIbW0zRq9g6yQp78zU";
        $accSecKey = "Ok28OrdLZjC3phWCHJJwLO0RFYECziHRiliBMic0";
        
        $sTime = floor(microtime(true) * 1000);
        $phone = $request->phone_num;
        $cert = $request->cert;
        $content = "[NUMVA] 인증번호 [".$cert."] 를 입력해주세요.";
        
        // The data to send to the API
        $postData = array(
            'type' => 'SMS',
            'countryCode' => '82',
            'from' => '01087973122', 
            'contentType' => 'COMM',
            'content' => $content,
            'messages' => array(array('content' => $content, 'to' => $phone))
        );
        
        $postFields = json_encode($postData) ;
        
        $hashString = "POST {$smsUri}\n{$sTime}\n{$accKeyId}";
        $dHash = base64_encode( hash_hmac('sha256', $hashString, $accSecKey, true) );
        
        $header = array(
            // "accept: application/json",
            'Content-Type: application/json; charset=utf-8',
            'x-ncp-apigw-timestamp: '.$sTime,
            "x-ncp-iam-access-key: ".$accKeyId,
            "x-ncp-apigw-signature-v2: ".$dHash
        );
        
        // Setup cURL
        $ch = curl_init($smsURL);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $postFields
        ));
        
        $response = curl_exec($ch);
        
        return response()->json([
            "isSuccess" => true,
            "code" => 200,
            "message" => "메세지 성공"
        ]);
    }
}
