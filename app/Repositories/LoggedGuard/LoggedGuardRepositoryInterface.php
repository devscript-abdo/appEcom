<?php

namespace App\Repositories\LoggedGuard;

interface LoggedGuardRepositoryInterface
{


 public function loggedUser();
 public function loggedUserId();
 public function getLoggedUserType();
	// more
}