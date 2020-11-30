<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    private $actions = ['admin' => 'admin.dash', 'moderator' => 'admin.leads'];

    public function handle($request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {


            if (Auth::guard($guard)->check()) {

                return  redirect(route($this->actions[$guard]));
            }

            return $next($request);
        }

        return $next($request);
    }
}
