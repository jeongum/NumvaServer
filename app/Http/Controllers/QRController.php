<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QRData;

class QRController extends Controller
{
    /* Show QR View to Scanner */
    public function index(){
        $qr_id = Session::get('qr_id');
        $qrcode = QRData::where('qr_id', $qr_id)->first();
        
        return view('qr/service', compact('qrcode'));
    }
    
    /* Generate QR */
    public function generateQRCode(){
        $qr_id = random_int(100000,999999);
        while(QRData::where('qr_id', $qr_id)->exists()){
            $qr_id = random_int(100000,999999);
        }
        $qr_path = 'http://ec2-13-125-250-97.ap-northeast-2.compute.amazonaws.com/qr/'.$qr_id;
        $img_path = 'img/qr/'.$qr_id.'.png';
       
        QrCode::format('png')
                ->size(500)
                ->merge('/public/img/logo_purple_with_bg.png', .2)
                ->generate($qr_path, public_path($img_path));
        
        QRData::create([
            "qr_id" => $qr_id,
            "url" => $img_path
        ]);
        
        return view('qr/generate');
    }
}
