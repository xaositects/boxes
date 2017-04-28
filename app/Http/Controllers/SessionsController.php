<?php

namespace Boxes\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct() {
//        $this->middleware('guest', ['except', 'kill']);
    }

    public function create() {
        return view('sessions.create');
    }

    public function store() {
        if (!auth()->attempt(request(['email', 'password']))) {
            return redirect('/login')->withErrors(['message' => 'Please check your credentials and try again.']);
        }
        $user = \Boxes\User::where('email', request('email'))->first();
        $up = \Boxes\UserProfile::where('users_id', $user->id)->first();
        \Session::put('active_profile_id', $up->id);
        return redirect('/profile');
    }

    public static function kill() {
        auth()->logout();
        \Log::info('logout success');
        return redirect('/');
    }

}
