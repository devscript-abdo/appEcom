<?php

namespace App\Services;

use App\Repositories\LoggedGuard\LoggedGuardRepositoryInterface;

class AuthService
{

    protected $model;

    private static $_instance = null;

    /**
     * AuthService constructor.
     * @param LoggedGuardRepositoryInterface $auth
     */
    public function __construct(LoggedGuardRepositoryInterface $auth)
    {

        $this->model = $auth;
    }

    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

}
