<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin(){
        return $this->admin==1;
    }

    public function beer() {
        return $this->belongsToMany('App\Models\Beer');
    }

    public function place() {
        return $this->belongsToMany('App\Models\Place');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function friends() {
        return $this->belongsToMany('App\Models\User', 'user_friends', 'user_id', 'friend_id');
    }

    public function hasFriend($id) {
        return $this->friends->contains($id);
    }
}
