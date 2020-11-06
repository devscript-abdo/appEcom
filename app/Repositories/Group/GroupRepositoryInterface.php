<?php

namespace App\Repositories\Group;

interface GroupRepositoryInterface
{


	public function all();

	public function find(int $id);

	public function findOrFail(int $id);

	public function create(array $attributes);

	public function update(array $attributes, $id);

	public function delete(int $id);

    public function paginate($page);
    
    public function select(array $fields);

	// more
}