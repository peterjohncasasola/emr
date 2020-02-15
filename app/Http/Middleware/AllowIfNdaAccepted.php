<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;

use Auth;
use Closure;
use App\Http\Controllers\User\UsersController;

class AllowIfNdaAccepted
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
        if (Auth::user()->is_nda_accepted==1) {
            return $next($request);
        } else {
            return redirect('/nda');
        }
    }
}
