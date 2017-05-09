<?php

namespace Boxes\Http\Controllers\Api;

use Illuminate\Http\Request;

class BoxController extends ApiController
{

    protected $boxTransformer;

    public function __construct(\Acme\Transformers\BoxTransformer $boxTransformer) {
        $this->middleware('auth.api');
        $this->boxTransformer = $boxTransformer;
    }

    public function index() {
        $boxes = \Boxes\Box.find(['user_profiles_id' => \Session::get('active_profile_id')]);
        return $this->respond([
                    'data' => $this->boxTransformer->transform($boxes)
        ]);
    }

    public function show($id) {
        $obj = Box::find($id);
        if (!$obj) {
            return $this->respondNotFound(Box::itemType() . ' not found');
        }
        return $this->respond([
                    'data' => $obj->boxTransformer->transform($obj)
        ]);
    }

}
