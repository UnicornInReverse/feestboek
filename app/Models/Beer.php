<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function users() {
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
    
}
