<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRData extends Model
{
    use HasFactory;
    protected $table = 'qrcode';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function safety_info(){
        return $this->hasOne(SafetyInfo::class, 'qr_id');
    }
}
