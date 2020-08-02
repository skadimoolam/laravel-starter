<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $date = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = ['name', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    public function file()
    {
        return $this->morphOne('App\Models\File', 'fileable')->latest();
    }

    public function logs()
    {
        return $this->morphMany('App\Models\Log', 'loggable');
    }

    public function scopeSearch($query, $q)
    {
        return $query
                ->where('name', 'LIKE', "%{$q}%")
                ->orWhere('email', 'LIKE', "%{$q}%")
                ->orWhere('role', 'LIKE', "%{$q}%")
                ->orWhere('status', 'LIKE', "%{$q}%")
                ->orWhere('notes', 'LIKE', "%{$q}%");
    }
}
