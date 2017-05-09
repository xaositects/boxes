<?php

namespace Boxes\Http\Controllers\Api;

use Illuminate\Http\Request;

class UserProfileTypeController extends ApiController
{
    
    protected $UserProfileTypeTransformer;

    public function __construct(\Acme\Transformers\UserProfileTypeTransformer $UserProfileTypeTransformer) {
        $this->middleware('auth.api');
        $this->UserProfileTypeTransformer = $UserProfileTypeTransformer;
    }

    public function index() {
        $obj = \Boxes\UserProfileType.find(['user_profiles_id' => \Session::get('active_profile_id')]);
        return $this->respond([
                    'data' => $this->UserProfileTypeTransformer->transform($obj)
        ]);
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
        return $this->respond([
                    'data' => $this->UserProfileTypeTransformer->transform($obj)
        ]);
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
