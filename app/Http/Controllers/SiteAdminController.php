<?php

namespace Boxes\Http\Controllers;

use Illuminate\Http\Request;

class SiteAdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        return view('site-admin.view');
    }
}
