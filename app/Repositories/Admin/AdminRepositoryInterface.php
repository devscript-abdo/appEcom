<?php

namespace App\Repositories\Admin;

interface AdminRepositoryInterface
{

    public function getInstance();

	public function getAll();

	public function getAdmin($id);

	public function create(array $attributes);

	public function createWithRole(array $attributes);

	public function update(array $attributes, $id);

	public function findOrFail($id);

	public function deleteAdmin($id);

	public function query();

	public function with($relation);
}
