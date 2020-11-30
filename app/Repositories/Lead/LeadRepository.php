<?php

namespace App\Repositories\Lead;

use App\Models\Lead;
use App\Repositories\LoggedGuard\LoggedGuardRepository;

class LeadRepository  implements LeadRepositoryInterface
{

	protected $model;

	protected $authUser;
	
	public function __construct(Lead $model, LoggedGuardRepository $authUser)
	{

		$this->model = $model;
		$this->authUser = $authUser;
	}

	public function auth()
	{
		return $this->authUser;
	}
	public function query()
	{
		return $this->model->query();
	}

	public function forLoggedUser()
	{
		return $this->model->where($this->authUser->getLoggedUserType() . '_id', $this->authUser->loggedUserId())->get();
	}

	public function all()
	{
		return $this->model->all();
	}

	public function find($id)
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

			return 	$data;
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

	public function destroy($id)
	{
		return $this->model->destroy($id);
	}

	public function paginate($page)
	{
		return $this->model->paginate($page);
	}
}
