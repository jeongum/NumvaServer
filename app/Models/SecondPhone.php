<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondPhone extends Model
{
    use HasFactory;
    protected $table = 'user_has_second_phone';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
