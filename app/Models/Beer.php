<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    protected $fillable = [
        'name', 'user_id'
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function addBeer($id)
    {
        return $this->users()->attach($id);
    }

    public function removeBeer($id)
    {
        return $this->users()->detach($id);
    }

    public function hasBeer($id)
    {
        return $this->users->contains($id);
    }

}
