<?php

namespace App\Services;

use App\Http\Requests\GroupRequest;
use App\Repositories\Group\GroupRepositoryInterface;

class GroupService extends Servicer
{


    protected $model;
    protected $auth;
    private static $_instance = null;

    /**
     * GroupService constructor.
     * @param GroupRepositoryInterface $group
     * @param AuthService $auth
     */
    public function __construct(GroupRepositoryInterface $group, AuthService $auth)
    {

        $this->model = $group;
        $this->auth = $auth;
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
        $form->merge($data);
        $data = $form->validate($form->rules());
        $group = $this->getInstance()->create($data);
        $group->{$this->authType()}()->associate($this->auth->getInstance()->loggedUserId())->save();
        return $group;
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function update(array $data)
    {
       // dd($data);
        $id = $data['id'];
        $form = $this->getRequest();
        $form->setId($id);
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->update($data, $id);
    }


    /******Authorisations system  */

}
