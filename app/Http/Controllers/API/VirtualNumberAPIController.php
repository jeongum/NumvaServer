<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
class VirtualNumberAPIController extends Controller
{
    private $token = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJkb3QyIiwiaWF0IjoxNjMxMTY2ODExfQ.Acit_AgPjVZ32K2vBghdfwBKnaW1WHfcGwNket-Wlfbd0_YQRHZtbmP09ZMN1njawfKiQoNmTxwmMsJa64DXnQ';
    private $baseURL = 'https://050api.sejongtelecom.net:8443/';
    public function setVN($vn, $phone){
        $response = Http::withToken($this->token)->post($this->baseURL.'050biz/v1/service/update/'.$vn,[
            "channelId" => "",
            "rcvNo1" => $phone,
            "colorringIdx" => 0,
            "rcvMentIdx" => 0,
            "bizEndMentIdx" => 0,
            "holiMentIdx" => 0,
            "bizStartTime" => "0000",
            "bizEndTime" => "2359",
            "holiWeek" => "11111",
            "holiDay" => "1111111",
            "recType" => "1",
            "holidaySet" => "N",
            "status" => is_null($phone)?"N":"Y"
        ]);
    }
}
