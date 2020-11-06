<?php 

namespace App\Repositories\City;

interface CityRepositoryInterface{

	
	public function getAll();

	public function getCity($id);

    public function getSelect(array $attributes);
}