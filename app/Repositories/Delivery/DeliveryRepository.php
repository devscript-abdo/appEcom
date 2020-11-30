<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 16/novembre/2020
 **/

namespace App\Repositories\Delivery;

use App\Models\Delivery;

class DeliveryRepository implements DeliveryRepositoryInterface
{

    private $model;

    protected static $_instance;

    public function __construct(Delivery $model)
    {
        $this->model = $model;
    }

    /**
     * @return Delivery
     */
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

    /**
     * @return mixed
     */
    public function all()
    {
       return $this->getInstance()->all();
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return $this->getInstance()->query();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function select(array $attributes)
    {
       return $this->getInstance()->select($attributes);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->getInstance()->create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return bool|mixed
     */
    public function update(array $data,int $id)
    {
        $data = $this->findOrFail($id);

        if ($data) {

            $data->update($data);

            return 	$data;
        }
        return false;
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        if (intval($id)) {
            $data = $this->findOrFail($id);
            $data->delete();
            return true;
        }
        return false;
    }

    /**
     * @param $ids
     * @return int
     */
    public function destroy($ids)
    {
        return $this->getInstance()->destroy($ids);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        return $this->getInstance()->find($id);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findOrFail(int $id)
    {
        return $this->getInstance()->findOrFail($id);
    }

    /**
     * @param array $relations
     * @return mixed
     */
    public function with(array $relations)
    {
        return $this->query()->with($relations);
    }

    /**
     * @param int $page
     * @return mixed
     */
    public function paginate(int $page)
    {
        return $this->getInstance()->paginate($page);
    }


}
