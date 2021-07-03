<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\QRData;
use App\Models\User;
use App\Models\Memo;

class SafetyInfo extends Model
{
    use HasFactory;
    protected $table = 'user_has_safety_info';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function qrcode(){
        return $this->belongsTo(User::class);
    }
    
    public function memo(){
        return $this->belongsTo(Memo::class);
    }
}