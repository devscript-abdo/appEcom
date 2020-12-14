<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use function PHPUnit\Framework\throwException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     *
     * $middlewareGuard return true if middleware auth:admin is present
     * that's mean the Url is dashboard
     * otherwise the url is other login logic
     */
    protected function redirectTo($request)
    {


      /*  return in_array('auth:admin,moderator', $request->route()->action["middleware"])
            ? route('admin.login') : route('login');*/

        $routes  = $request->route()->action['middleware'];

        switch ($routes[1]){
            case 'auth:delivery':
                return  route('delivery.login');
                break;
            case 'auth:admin,moderator':
                return  route('admin.login');
                break;
            default :
                return route('login');
        }


    }
}
