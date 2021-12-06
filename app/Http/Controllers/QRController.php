<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QRData;
use App\Models\User;
use App\Models\Memo;
use App\Models\SafetyNumber;
use App\Models\SafetyInfo;

class QRController extends Controller
{
    
    /* Show QR View to Scanner */
    public function service(){
        $qr_id = Session::get('qr_id');
        $qrcode = QRData::where('qr_id', $qr_id)->first();
        $safety_info = SafetyInfo::where('qr_id', $qrcode->id)->first();
        $memo = is_null($safety_info->memo)?"":$safety_info->memo;
        $this->sendNoti($safety_info->user->phone);
        
        return view('qr/service', compact('memo'));
    }
    
    /* Send NOTI */
    public function sendNoti($phone_num){
        $sID = "ncp:sms:kr:268949396524:numva"; // 서비스 ID
        $smsURL = "https://sens.apigw.ntruss.com/sms/v2/services/".$sID."/messages";
        $smsUri = "/sms/v2/services/".$sID."/messages";
        $sKey = "47d70b42c3c74a42aeaca4a907968191";
        
        $accKeyId = "ySlIbW0zRq9g6yQp78zU";
        $accSecKey = "Ok28OrdLZjC3phWCHJJwLO0RFYECziHRiliBMic0";
        
        $sTime = floor(microtime(true) * 1000);
        $phone = $phone_num;
        $content = "[NUMVA] QR이 스캔되었습니다!";
        
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
