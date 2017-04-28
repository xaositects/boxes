<?php

namespace Boxes;

use Illuminate\Database\Eloquent\Model;

class BoxItem extends Model
{
    public function box()
    {
        return $this->belongsTo('Boxes\Box');
    }
    public function boxItemType() {
        return $this->hasOne('Boxes\BoxItemType');
    }
}
