<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class UserFile extends Model
{
    public function user()
    {
        return $this->belongsTo('Boxes\User');
    }
    public function userFileType() {
        return $this->hasOne('Boxes\UserFileType');
    }
}
