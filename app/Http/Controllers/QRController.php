<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QRController extends Controller
{
    /* Show QR View to Scanner */
    public function index(){
        $qr_id = Session::get('qr_id');
        dd($qr_id);
    }
}
