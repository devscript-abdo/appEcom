<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

    /**
     * @var string[]
     */
    private $actions = ['admin' => 'admin.dash', 'moderator' => 'admin.leads','delivery'=>'delivery.dash'];

    /**
     * @param $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return Application|RedirectResponse|Redirector|mixed
     */
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
