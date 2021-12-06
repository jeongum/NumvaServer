<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QRData;
use App\Models\User;
use App\Models\Memo;
use App\Models\SafetyNumber;

class SafetyInfo extends Model
{
    use HasFactory;
    protected $table = 'user_has_safety_info';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function qrcode(){
        return $this->belongsTo(QRData::class, 'qr_id');
    }
    
    public function memo(){
        return $this->belongsTo(Memo::class, 'memo_id');
    }
    
    public function safety_number(){
        return $this->belongsTo(SafetyNumber::class, 'sn_id');
    }
}
