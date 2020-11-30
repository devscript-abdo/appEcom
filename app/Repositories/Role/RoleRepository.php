<?php

namespace App\Repositories\Role;

use Spatie\Permission\Models\Role;

class RoleRepository implements RoleRepositoryInterface
{


	public function All()
	{
		return Role::all();
	}

	public function Find($id)
	{
		return Role::findOrFail($id);
	}

	public function Select($attributes)
	{
		return Role::select($attributes);
	}

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        return Role::create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $role = Role::findOrFail($id);

        return $role->update($data);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return Role::query();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
     $role = Role::findOrFail($id);
     return $role->delete($id);
    }
}
