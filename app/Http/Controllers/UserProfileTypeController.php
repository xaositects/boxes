<?php

namespace Boxes\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileTypeController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('profile-types.view', ['profiletypes' => \Boxes\UserProfileType::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('profile-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'rank' => 'required|integer'
        ]);
        $obj = new \Boxes\UserProfileType;
        $obj->name = request('name');
        $obj->rank = request('rank');
        $obj->save();
        return redirect('/profile-types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        return view('profile-types.edit', ['profiletype' => \Boxes\UserProfileType::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $this->validate(request(), [
            'name' => 'required|max:255',
            'rank' => 'required|integer'
        ]);
        $obj = \Boxes\UserProfileType::find($id);
        $obj->name = request('name');
        $obj->rank = request('rank');
        $obj->save();
        return redirect()->route('profile-types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $obj = \Boxes\UserProfileType::find($id);
        $obj->delete();
        return redirect()->route('profile-types');
    }

}
