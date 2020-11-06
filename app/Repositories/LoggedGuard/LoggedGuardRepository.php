<?php

namespace App\Repositories\LoggedGuard;

use Illuminate\Support\Facades\Auth;

class LoggedGuardRepository implements LoggedGuardRepositoryInterface
{

    protected $guard;

    public function __construct(Auth $guard)
    {

        $this->guard = $guard;
    }

    public function loggedUser()
    {
        return $this->guard::user();
    }
}
