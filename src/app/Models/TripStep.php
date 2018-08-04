<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripStep extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'beginn',
        'end',
        'deleted_at',
    ];

    // -----------------------
    // ---- Relationships ----
    // -----------------------

    public function trip() {
        return $this->belongsTo(\App\Models\Trip::class);
    }

}
