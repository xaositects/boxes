<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function user()
    {
        return $this->belongsTo('Boxes\User');
    }
    public function boxType() {
        return $this->hasOne('Boxes\BoxType');
    }
}
