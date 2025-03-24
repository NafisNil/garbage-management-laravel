<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    //
    protected $fillable = ['amount', 'status', 'organization_id', 'user_id'];
    public function organization(){
        return $this->belongsTo(Organization::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
