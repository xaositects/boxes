<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class UserProfileType extends Model
{
    protected $fillable = ['name', 'rank'];
    public function profile()
    {
        return $this->belongsTo('Boxes\UserProfile');
    }
}
