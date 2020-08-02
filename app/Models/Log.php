<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $guarded = [];
    protected $dates = ['created_at', 'updated_at'];

    public function loggable() {
        return $this->morphTo();
    }

    public function scopeSearch($query, $q)
    {
        return $query
                ->where('title', 'LIKE', "%{$q}%")
                ->orWhere('description', 'LIKE', "%{$q}%")
                ->orWhere('loggable_type', 'LIKE', "%{$q}%")
                ->orWhere('loggable_id', 'LIKE', "%{$q}%");
    }
}
