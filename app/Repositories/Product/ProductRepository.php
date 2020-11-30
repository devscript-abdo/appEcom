<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\Root\RootRepository;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository implements ProductRepositoryInterface
{


    protected $model;

    protected $allowedsFilters;

    public function __construct(Product $model, $allowedsFilters)
    {

        $this->model = $model;

        $this->allowedsFilters = $allowedsFilters;
    }

    public function getFilters()
    {
        return $this->allowedsFilters;
    }
    public function query()
    {
        return $this->model->query();
    }

    public function withRelations(array $relation)
    {
        return $this->model->query()->with($relation);
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }
    public function findOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function update(array $attributes, $id)
    {
        $data = $this->findOrFail($id);

        if ($data) {

            $data->update($attributes);

            return true;
        }
        return false;
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

    public function paginate($page)
    {
        return $this->model->paginate($page);
    }

    public function select(array $fields)
    {
        return $this->model->select($fields)->get();
    }

    public function whereColumn($colums){
        return $this->model->whereColumn($colums)->get();
    }
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }


    /***** */

}
