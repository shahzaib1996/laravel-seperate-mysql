<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckUser
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
        if( Auth::user()->is_admin == 1 ) {
            session()->flash('status', 'Access Denied');
            session()->flash('class', 'alert-danger');
            return redirect('home');
        }
        return $next($request);
    }
}
