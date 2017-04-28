<?php

namespace Boxes\Http\Controllers\Auth;

use Boxes\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Login Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles authenticating users for the application and
      | redirecting them to your home screen. The controller uses a trait
      | to conveniently provide its functionality to your applications.
      |
     */

use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    protected function guard() {
        return \Auth::guard('web');
    }

    public function getLogout() {
        auth()->logout();
        \Log::error('test');
        Session::flush();
        return redirect('/');
    }

}
