<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trip extends Model
{
    use SoftDeletes;
    
    protected $dates = [
        'deleted_at',
    ];

    // -------------------
    // ---- Accessors ----
    // -------------------

    public function getBeginnAttribute(): ?Carbon {
        $steps = $this->steps()->get();

        if ($steps->isNotEmpty()) {
            return $steps->first()->beginn;
        }

        return null;
    }

    public function getEndAttribute(): ?Carbon {
        $steps = $this->steps()->get();

        if ($steps->isNotEmpty()) {
            return $steps->last()->beginn;
        }

        return null;
    }

    // -----------------------
    // ---- Relationships ----
    // -----------------------

    public function user() {
        return $this->belongsTo(\App\User::class);
    }

    public function steps() {
        return $this->hasMany(\App\Models\TripStep::class)->orderBy('beginn');
    }

}
