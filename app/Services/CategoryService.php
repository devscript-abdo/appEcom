<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 30/novembre/2020
 **/

namespace App\Services;


use App\Http\Requests\CategoryRequest;

use App\Repositories\Category\CategoryRepositoryInterface;

class CategoryService extends Servicer
{

    protected $model;
    protected $auth;
    private static $_instance = null;

    public function __construct(CategoryRepositoryInterface $model, AuthService $auth)
    {

        $this->model = $model;
        $this->auth = $auth;
    }


    protected function getRequest()
    {
        return  new CategoryRequest();
    }


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
