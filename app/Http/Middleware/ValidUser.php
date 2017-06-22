<?php

namespace App\Http\Middleware;

use Closure;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = \Auth::user();
        if($user->closed == 1){
            \Auth::logout();
            return redirect('/');
        }

        return $next($request);
    }
}
