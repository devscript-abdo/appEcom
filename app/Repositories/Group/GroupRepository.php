<?php

namespace App\Repositories\Group;

use App\Models\Group;


class GroupRepository implements GroupRepositoryInterface
{

	protected $model;

	public function __construct(Group $model)
	{

		$this->model = $model;
	}

	public function all()
	{
		return $this->model->all();
	}

	public function find(int $id)
	{
		return $this->model->find($id);
	}
	public function findOrFail(int $id)
	{
		return $this->model->findOrFail($id);
	}

	public function create(array $attributes)
	{
		return $this->model->create($attributes);
	}

	public function update(array $attributes, $id)
	{
		$data = $this->findOrFail($id);

		if ($data) {

			$data->update($attributes);

			return 	true;
		}
		return false;
	}

	public function delete(int $id)
	{
		if (intval($id)) {
			$data = $this->findOrFail($id);
			$data->delete();
			return true;
		}
		return false;
	}

	public function paginate($page)
	{
		return $this->model->paginate($page);
	}

	public function select(array $fields)
	{
		return $this->model->select($fields)->get();
	}

    public function with(array $relations){

        return $this->model->query()->with($relations);
    }
}
