<?php

namespace Boxes\Http\Middleware;

use Closure;

class Admin
{

    public function handle($request, Closure $next) {
        if (\Auth::check() && \Auth::user()->is_admin == 1) {
            return $next($request);
        }

        return redirect('home');
    }

}
