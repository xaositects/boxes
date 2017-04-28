<?php

namespace Boxes\Observers;

use Boxes\User;

class UserObserver
{

    public function created(User $user) {
        $userprofile = new \Boxes\UserProfile;
        $userprofile->users_id = $user->id;
        $userprofile->firstname = request('firstname');
        $userprofile->lastname = request('lastname');
        $userprofile->user_profile_types_id = \Boxes\UserProfileType::where('name', 'Basic Collector')->first()->id;
        $userprofile->save();
        auth()->user()->name = $userprofile->firstname . '' . $userprofile->lastname;
    }

    /**
     * Listen to the User deleting event.
     *
     * @param  User  $user
     * @return void
     */
    public function deleting(User $user) {
        //
    }

}
