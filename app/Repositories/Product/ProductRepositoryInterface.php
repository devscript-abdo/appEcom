<?php

namespace App\Repositories\Product;
use Illuminate\Database\Eloquent\Model;
interface ProductRepositoryInterface
{
	public function all();

	public function find(int $id);

	public function findOrFail(int $id);

	public function create(array $attributes);

	public function update(array $attributes, $id);

	public function delete(int $id);
	
	public function destroy($id);

	public function paginate($page);

	public function select(array $fields);

	public function query();

	public function withRelations(array $relation);

	public function getFilters();
}
