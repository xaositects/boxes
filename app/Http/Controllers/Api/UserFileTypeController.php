<?php

namespace Boxes\Http\Controllers;

use Illuminate\Http\Request;

class UserFileTypeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
}
