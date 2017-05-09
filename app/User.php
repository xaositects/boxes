<?php

namespace Boxes;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($pass) {
        $this->attributes['password'] = \Hash::make($pass);
    }

    public function profiles() {
        return $this->hasMany('Boxes\UserProfile');
    }
    
    public function isAdmin() {
        return $this->is_admin;
    }

}
