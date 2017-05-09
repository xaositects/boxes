<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = ['firstname', 'lastname', 'users_id', 'user_profile_types_id'];
    public function user()
    {
        return $this->belongsTo('Boxes\User');
    }
    public function userProfileType() {
        return $this->hasOne('Boxes\UserProfileType');
    }
    public function files() {
        return $this->hasMany('Boxes\UserFile');
    }
}
