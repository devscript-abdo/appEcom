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
    public function loggedUserId()
    {
        return $this->guard::user()->id;
    }
    public function getLoggedUserType()
    {
        if ($this->guard::guard('admin')->check()) {
            return "admin";
        } elseif ($this->guard::guard('moderator')->check()) {
            return "moderator";
        } elseif ($this->guard::guard('delivery')->check()) {
            return "delivery";
        }
        return 'admin';
    }
}
