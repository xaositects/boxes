<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class UserFileType extends Model
{
    public function file()
    {
        return $this->belongsTo('Boxes\UserFile');
    }
}
