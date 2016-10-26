<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable = [
        'user_id'        
    ];
    
    public function user() {
        return $this->belongsToMany('App\Models\User');
    }
    
    public function addFriend($id) {
        return $this->user()->attach($id);
    }
    
    public function removeFriend($id) {
        return $this->user()->detach($id);
    }
    
    public function hasFriend($id) {
        return $this->user->contains($id);
    }
}
