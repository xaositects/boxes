<?php

namespace Boxes\Http\Controllers;

use Boxes\User;

class RegistrationController extends Controller
{

    public function create() {
        return view('registration.create');
    }

    public function store() {
        //validate the form
        $this->validate(request(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|max:255|email',
            'password' => 'required|min:8|confirmed'
        ]);
        //create and save user
        $user = new \Boxes\User;
        $user->email = request('email');
        $user->password = request('password');
        $user->save();
        //sign user in
        auth()->login($user);
        //redirect to profile
        return redirect('/');
    }

}
