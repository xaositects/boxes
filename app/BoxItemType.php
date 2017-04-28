<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class BoxItemType extends Model
{
    public function item()
    {
        return $this->belongsTo('Boxes\BoxItem');
    }
}
