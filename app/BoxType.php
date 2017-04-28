<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class BoxType extends Model
{
    public function box()
    {
        return $this->belongsTo('Boxes\Box');
    }
}
