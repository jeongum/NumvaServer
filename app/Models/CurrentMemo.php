<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrentMemo extends Model
{
    use HasFactory;
    
    protected $table = 'memo_current';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}

