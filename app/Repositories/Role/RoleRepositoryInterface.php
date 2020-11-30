<?php

namespace App\Repositories\Role;

interface RoleRepositoryInterface{


    public function create($data);

    public function update($data,$id);

    public function query();

	public function All();

	public function Find($id);

	public function Select(array $attributes);

	public function delete($id);

	// more
}
