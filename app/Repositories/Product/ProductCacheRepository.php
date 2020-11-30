<?php

namespace App\Repositories\Product;

use App\Models\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Cache\CacheManager;

class ProductCacheRepository implements ProductRepositoryInterface
{


    protected $model;
    protected $cache;
    protected $allowedsFilters;

    const TTL = 1440; // TTL(Time To Live) 1440 = 1day


    public function __construct(Product $model, CacheManager $cache, $allowedsFilters)
    {

        $this->model = $model;
        $this->cache = $cache;
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

        return $this->query()->with($relation);
    }

    public function all(): Collection
    {
        return $this->cache->remember('products', self::TTL, function () {
            return $this->model->all();
        });
        //  return $this->model->all();

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

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }


    /***** */
}
