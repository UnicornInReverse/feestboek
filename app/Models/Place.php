<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $fillable = [
       'name', 'user_id', 'review'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function addPlace($id)
    {
        return $this->users()->attach($id);
    }

    public function removePlace($id)
    {
        return $this->users()->detach($id);
    }

    public function hasPlace($id)
    {
        return $this->users->contains($id);
    }

    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }
}
