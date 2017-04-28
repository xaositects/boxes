<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class UserProfileType extends Model
{
    public function profile()
    {
        return $this->belongsTo('Boxes\UserProfile');
    }
}
