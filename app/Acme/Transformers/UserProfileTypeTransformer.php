<?php

namespace Acme\Transformers;

class BoxTransformer extends Transformer
{
    public function transform($box) {
        return [
            'name' => $box['name'],
            'rank' => $box['rank']
        ];
    }
}
