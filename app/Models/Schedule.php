<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $fillable = ['day', 'time', 'date', 'status', 'organization_id'];
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
