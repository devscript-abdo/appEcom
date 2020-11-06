<?php

namespace App\Repositories\Lead;


interface LeadRepositoryInterface 
{


	public function all();

	public function find($id);

	public function findOrFail(int $id);

	public function create(array $attributes);

	public function update(array $attributes, $id);

	public function delete(int $id);

	public function destroy($id);

	public function paginate($page);

	public function query();

	

	// more
}
