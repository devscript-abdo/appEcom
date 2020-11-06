<?php

namespace App\Repositories\Admin;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class AdminRepository implements AdminRepositoryInterface
{
	protected $model;

	public function __construct(Admin $model) {

        $this->model = $model;
    }
	public function getAll(): Collection
	{
		return $this->model->all();
	}

	public function getAdmin($id): Collection
	{
		return $this->model->findOrFail($id);
	}

	public function create(array $attributes): Model
	{
		return $this->model->create($attributes);
	}

	public function createWithRole(array $attributes): Model
	{
		$admin = $this->model->create($attributes);
		$admin->assignRole($attributes['role']);
		return $admin;
	}

	public function findOrFail($id)
	{
		return $this->model->findOrFail($id);
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
