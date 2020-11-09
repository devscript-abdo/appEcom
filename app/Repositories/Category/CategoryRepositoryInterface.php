<?php

namespace App\Repositories\Category;


interface CategoryRepositoryInterface 
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
    
	public function select(array $fields);
	
	public function selectWithType(array $fields, $type);

	

	// more
}