<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoredMemo extends Model
{
    use HasFactory;
    
    protected $table = 'memo_stored';
    
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
