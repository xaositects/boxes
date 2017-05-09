<?php

namespace Boxes\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        return view('profile.view');
    }
    public function create(){
        return view('profile.create');
    }
    public function update(){
        return view('profile.update');
    }
    public function store(\Illuminate\Http\Request $request){
        $act = $request->route()->getAction()['act'];
        $this->validate(request(), [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255'
        ]);
        //create and save user

        if($act == 'update') {
            $obj = \Boxes\UserProfile::find(\Session::get('active_profile_id'));
        }else{
            $obj = new \Boxes\UserProfile;
            $obj->users_id = auth()->user()->id;
            $obj->user_profile_types_id = \Boxes\UserProfileType::where('name', 'Basic Collector')->first()->id;
        }
        $obj->firstname = request('firstname');
        $obj->lastname = request('lastname');
        $obj->save();
        return redirect('/profile');
    }
    public function switchProfile($id){
        \Boxes\UserProfile::find(\Session::put('active_profile_id', (int)$id));
        return redirect('/profile');
    }
}
