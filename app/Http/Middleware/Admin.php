<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if(!\Auth::check() || !\Auth::user()->is_admin)
        {
            session()->flash('error', 'You must be the admin user to see that resource');
            return redirect('/posts');
        }
        return $next($request);
    }
}
