<?php

namespace App\Repositories\City;

interface CityRepositoryInterface{

    public function getInstance();

	public function getAll();

	public function getCity($id);

    public function getSelect(array $attributes);

    public function create(array $attributes);

    public function update(array $attributes, $id);

    public function find($id);

    public function findOrFail(int $id);

    public function delete(int $id);
}
