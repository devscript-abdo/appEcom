<?php

namespace App\Repositories\Category;

use App\Models\Category;


class CategoryRepository  implements CategoryRepositoryInterface
{

    protected $model;

    public function __construct(Category $model)
    {

        $this->model = $model;
    }

    public function query()
    {
        return $this->model->query();
    }

    public function select(array $fields)
    {
        return $this->model->select($fields)->get();
    }

    public function selectWithType(array $fields, $type)
    {

        return $this->model->whereType($type)->select($fields)->get();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
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

            return     $data;
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

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function paginate($page)
    {
        return $this->model->paginate($page);
    }
}
