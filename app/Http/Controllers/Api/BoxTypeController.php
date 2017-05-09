<?php

namespace Boxes\Http\Controllers;

use Illuminate\Http\Request;

class BoxTypeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
}
