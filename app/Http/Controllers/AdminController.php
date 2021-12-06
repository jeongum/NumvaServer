<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\QRData;
use App\Models\User;
use App\Models\Memo;
use App\Models\SafetyNumber;
use App\Models\SafetyInfo;
use App\Models\SecondPhone;
use App\Http\Controllers\API\VirtualNumberAPIController;


class AdminController extends Controller
{
    protected $virtualNumberCont;
    
    public function __construct(){
        $this->virtualNumberCont = new VirtualNumberAPIController();
    }
    
    public function index(){
        $users = User::all();
        $qrs = QRData::with('safety_info.user')->get();
        return view('admin/qr/index',compact('users','qrs'));
    }
    /* Generate QR */
    public function generateQRCode(){
        $qr_id = random_int(100000,999999);
        while(QRData::where('qr_id', $qr_id)->exists()){
            $qr_id = random_int(100000,999999);
        }
        $qr_path = 'http://211.37.147.142/qr/'.$qr_id;
        $img_path = 'img/qr/'.$qr_id.'.png';
        
        QrCode::format('png')
        ->size(500)
        ->merge('/public/img/logo.png', .15)
        ->generate($qr_path, public_path($img_path));
        
        QRData::create([
            "qr_id" => $qr_id,
            "url" => $img_path
        ]);
        
        return redirect()->route('admin.index');
    }
    
    public function connectQR(Request $request){
        $data = array(
            "qr_id" => $request->qr_id,
            "user_id" => $request->user_id
        );
        
        $qr=QRData::find($data['qr_id']);
        $sn = SafetyNumber::where('is_allot', 'N')->first();
        $qr->is_allot = 'Y';
        $sn->is_allot = 'Y';
        $response = array(
            'user_id' => $data['user_id'],
            'qr_id' => $qr->id,
            'sn_id' => $sn->id,
            'name' => $qr->qr_id
        );
        SafetyInfo::create($response);
        $qr->save();
        $sn->save();
        $user = User::find($data['user_id']);
        $this->virtualNumberCont->setVN(str_replace("-","",$sn->number),$user->phone);
        return redirect()->route('admin.index');
    }
    
    public function unconnectQR(Request $request){
        $data = array(
            "qr_id" => $request->qr_id,
        );
        $qr=QRData::find($data['qr_id']);
        $si = SafetyInfo::where('qr_id',$data['qr_id'])->first();
        $sn = SafetyNumber::find($si->sn_id);
        $qr->is_allot = 'N';
        $sn->is_allot = 'N';
        $qr->save();
        $sn->save();
        $si->delete();
        return redirect()->route('admin.index');
    }
    
    public function userIndex(){
        $users = User::with('second_phone')->get();
        return view('admin.user.index', compact('users'));
    }

    public function userDelete(Request $request){
        User::find($request->id)->delete();
        return redirect()->route('admin.user');
    }
    
    public function secondphoneDelete($id){
        SecondPhone::find($id)->delete();
        return redirect()->route('admin.user');
    }
    
    
    public function safetyInfoIndex(){
        $safetyInfos = SafetyInfo::with('user','memo','safety_number','qrcode')->get();
        return view('admin.safetyInfo.index', compact('safetyInfos'));
    }
}
