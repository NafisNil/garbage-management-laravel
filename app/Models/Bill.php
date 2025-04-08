<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable = ['month', 'year', 'amount', 'status', 'user_id', 'vendor_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function vendor(){
        return $this->belongsTo(User::class, 'vendor_id');
    }
}
