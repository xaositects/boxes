<?php

namespace Boxes\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view)
        {
            $user = request()->user();
            if(is_object($user)) {
                $profile = \Boxes\UserProfile::where(['users_id' => $user->id, 'id' => \Session::get('active_profile_id')])->first();
                $profiles = \Boxes\UserProfile::where(['users_id' => $user->id])->get();

                $view->with('user', $user);
                $view->with('profile', $profile);
                $view->with('profiles', $profiles);
                
            }
            $view->with('app_name', config('app.name'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}