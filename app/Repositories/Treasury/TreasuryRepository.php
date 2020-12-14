<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 07/décembre/2020
 **/

namespace App\Repositories\Treasury;


use App\Models\Treasury;
use App\Services\AuthService;

class TreasuryRepository implements TreasuryRepositoryInterface
{

    protected $model;
    protected $auth;
    protected static $_instance;


    /**
     * TreasuryRepository constructor.
     * @param Treasury $model
     * @param AuthService $auth
     */
    public function __construct(Treasury $model, AuthService $auth)
    {
        $this->auth = $auth;
        $this->model = $model;
    }

    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }


    public function all()
    {
        return $this->getInstance()->all();
    }

    public function find(int $id)
    {
        return $this->getInstance()->find($id);
    }

    public function findOrFail(int $id)
    {
        return $this->getInstance()->findOrFail($id);
    }

    public function create(array $attributes)
    {
        $auth = $this->auth->getInstance();
        $data = $this->getInstance()->create($attributes);
        $data->{$auth->getLoggedUserType()}()->associate($auth->loggedUserId())->save();
        return $data;
    }

    public function update(array $attributes, $id)
    {
        $data = $this->findOrFail($id);

        if ($data) {

            $data->update($attributes);

            return $data;
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
        return $this->getInstance()->paginate($page);
    }

    public function select(array $fields)
    {
        return $this->getInstance()->select($fields);
    }

    public function with(array $relations)
    {
        return $this->query()->with($relations);
    }

    public function query()
    {
        return $this->getInstance()->query();
    }
}
