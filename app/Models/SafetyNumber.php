<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SafetyNumber extends Model
{
    use HasFactory;
    
    protected $table = 'safety_number';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function safety_info(){
        return $this->hasOne(SafetyInfo::class, 'sn_id');
    }
}
