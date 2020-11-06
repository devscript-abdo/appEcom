<?php 

namespace App\Repositories\Role;

interface RoleRepositoryInterface{
	
	
	public function getAll();

	public function getRole($id);

	public function getSelect(array $attributes);
 
	// more
}