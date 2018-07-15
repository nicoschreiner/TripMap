<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
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

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

}
