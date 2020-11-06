<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{


	public function getAll()
	{
		return Role::all();
	}

	public function getRole($id)
	{
		return Role::findOrFail($id);
	}

	public function getSelect($attributes)
	{
		return Role::select($attributes)->get();
	}
}
