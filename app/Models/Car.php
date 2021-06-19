<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user()  {
        return $this->belongsTo('User', 'user_id');
    }

    public function safety_info()   {
        return $this->belongsTo('SafetyInfo', 'safety_info_id');
    }
}
