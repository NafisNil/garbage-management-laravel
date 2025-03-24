<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    //
    protected $fillable = [
        'city_corporation',
        'ward',
        'thana',
        'road',
        'house',
        'flat',
        'others',
        'logo',
        'user_id',
        'waste_type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
