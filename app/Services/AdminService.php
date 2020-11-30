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


use App\Http\Requests\AdminCrudRequest;
use App\Repositories\Admin\AdminRepositoryInterface;

class AdminService extends Servicer
{

    protected $model;
    protected static $_instance = null;
    public function __construct(AdminRepositoryInterface $model)
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

        return new AdminCrudRequest();
    }


    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        if(is_null($data) || !is_array($data)){

            return false ;
        }
        $form = $this->getRequest();
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->createWithRole($data);
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function update(array $data)
    {
        if(is_null($data) || !is_array($data)){

            return false ;
        }
        if(is_null($data['id']) || !is_int($data['id'])){

            return false ;
        }
        $id = $data['id'];
        $form = $this->getRequest();
        $form->setId($id);
        $form->merge($data);
        $data = $form->validate($form->rules());
        return $this->getInstance()->update($data, $id);
    }
}
