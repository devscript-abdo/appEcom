<?php

namespace App\Repositories\Admin;

use App\Models\Admin;

class AdminRepository implements AdminRepositoryInterface
{
	protected $model;
    protected static $_instance;

	public function __construct(Admin $model) {

        $this->model = $model;
    }

    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

    public function query()
    {
        return $this->getInstance()->query();
    }

    public function with($relation)
    {
        return $this->query()->with($relation);
    }
	public function getAll()
	{
        return $this->getInstance()->all();
	}

	public function getAdmin($id)
	{
		return $this->getInstance()->findOrFail($id);
	}

	public function create(array $attributes)
	{

		return $this->getInstance()->create($attributes);
	}

	public function createWithRole(array $attributes)
	{
		$admin = $this->getInstance()->create($attributes);
		$admin->assignRole($attributes['role']);
		return $admin;
	}

	public function findOrFail($id)
	{
		return $this->getInstance()->findOrFail($id);
	}

	public function update(array $attributes, $id)
	{
		$admin = $this->findOrFail($id);
		if ($admin) {
			$admin->update($attributes);
			//$admin->assignRole($attributes['role']);
			return 	true;
		}
		return false;
	}

	public function deleteAdmin($id)
	{
		if (intval($id)) {
			$admin = $this->findOrFail($id);
			$admin->delete();
			return true;
		}
		return false;
	}
}
