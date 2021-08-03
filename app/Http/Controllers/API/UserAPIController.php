<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class UserAPIController extends Controller
{
    public function getUser(Request $request) {
        $user = array(
            'id' => $request->user()->id,
            'name' => $request->user()->name,
            'nickname'=>$request->user()->nickname,
            'email' => $request->user()->email,
            'phone' => $request->user()->phone,
            'second_phone' => (($sp = $request->user()->rep_second_phone()->first())==null)?null:$sp->second_phone,
            'birth' => $request->user()->birth,
        );
        return $this->Success($user);
    }
    
    public function editUser(Request $request){
        if(is_null($request->phone) || is_null($request->birth) || is_null($request->nickname)) return $this->NoParam();
        $user = $request->user();
        $user->phone = $request->phone;
        $user->birth = $request->birth;
        $user->nickname = $request->nickname;
        $user->save();
        return $this->Success($user);
    }
    
    public function changeNick(Request $request){
        $isdata = false;
        $user = $request->user();
        $user->nickname = isset($request -> nickname)?$request -> nickname: $isdata = true;
        if($isdata) return $this->NoParam();
        $user->save();
        
        return $this->Success($user);
    }
    
    public function validEmail(Request $request){
        if(User::where('email', $request->email)->exists())
            return $this->AlreadyExists();
            return $this->Success(null);
    }
    
    public function findEmail(Request $request){
        if(!isset($request->phone) || !isset($request->name)) return $this->NoParam();
        $data = $request->all();
        $user = User::where([['phone',$data['phone']],['name',$data['name']]])->first();
        if(!is_null($user)){
            $email = $user->email;
            return $this->Success($email);
        }
        return $this->NoMatchedData();
    }
    
    public function certForResetPW(Request $request){
        if(!isset($request->email) || !isset($request->phone)) return $this->NoParam();
        $data = $request->all();
        $user = User::where([['email',$data['email']],['phone',$data['phone']]])->first();
        if($user == null) return $this->NoMatchedData();
        return $this->Success(null);
    }
    
    public function resetPW(Request $request){
        if(!isset($request->email) || !isset($request->phone)) return $this->NoParam();
        $data = $request->all();
        $user = User::where([['email',$data['email']],['phone',$data['phone']]])->first();
        if ($user != null) {
            $user -> password = bcrypt($data['new_pw']);
            $tokens = $user->tokens;
            foreach($tokens as $token){
                $token->revoke();
            }
            $user -> save();
            return $this->Success(null);
            
        } else return $this->NoMatchedData();
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
