<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 16/novembre/2020
 **/

namespace App\Services;


use App\Http\Requests\RoleRequest;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleService extends Servicer
{
    protected $model;
    protected static $_instance = null;
    public function __construct(RoleRepositoryInterface $model)
    {
        $this->model = $model;
    }
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }
    protected function getRequest(){

        return new RoleRequest();
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {

        $form = $this->getRequest();
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->create($data);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function update(array $data)
    {
        $id = $data['id'];
        $form = $this->getRequest();
        $form->setId($id);
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->update($data, $id);
    }
}
