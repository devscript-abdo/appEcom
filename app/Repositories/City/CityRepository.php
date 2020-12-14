<?php

namespace App\Repositories\City;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityRepository implements CityRepositoryInterface
{


    protected $model;
    protected static $_instance;

    /**
     * CityRepository constructor.
     * @param City $model
     */
    public function __construct(City $model)
    {

        $this->model = $model;
    }

    /**
     * @return City
     */
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

    /**
     * @return City[]|Collection
     */
    public function getAll()
    {
        return $this->getInstance()->all();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCity($id)
    {
        return $this->getInstance()->findOrFail($id);
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function getSelect(array $attributes)
    {
        return $this->getInstance()->select($attributes)->get();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->getInstance()->create($attributes);
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

    public function find($id)
    {
        return $this->getInstance()->find($id);
    }
    public function findOrFail(int $id)
    {
        return $this->getInstance()->findOrFail($id);
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
}
