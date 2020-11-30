<?php

namespace App\Services;

use App\Http\Requests\GroupRequest;
use App\Repositories\Group\GroupRepositoryInterface;

class GroupService extends Servicer
{


    protected $model;

    private static $_instance = null;

    /**
     * GroupService constructor.
     * @param GroupRepositoryInterface $group
     */
    public function __construct(GroupRepositoryInterface $group)
    {

        $this->model = $group;
    }

    /**
     * @return GroupRequest
     */
    protected function getRequest()
    {
        return  new GroupRequest();
    }

    /**
     * @return GroupRepositoryInterface|null
     */
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {

        $form = $this->getRequest();
        //array_merge($this->fields, ['addedby' => 'abdo'])
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


    /******Authorisations system  */

}
