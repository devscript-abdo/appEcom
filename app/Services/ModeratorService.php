<?php

namespace App\Services;

use App\Http\Requests\ModeratorRequest;
use App\Repositories\Moderator\ModeratorRepositoryInterface;

class ModeratorService extends Servicer
{

    protected $model;

    private static $_instance = null;

    /**
     * ModeratorService constructor.
     * @param ModeratorRepositoryInterface $moderator
     */
    public function __construct(ModeratorRepositoryInterface $moderator)
    {

        $this->model = $moderator;
    }

    /**
     * @return ModeratorRequest
     */
    protected function getRequest()
    {
        return  new ModeratorRequest();
    }

    /**
     * @return ModeratorRepositoryInterface|null
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
