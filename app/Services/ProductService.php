<?php

namespace App\Services;

use App\Http\Requests\ProductRequest;
use App\Repositories\Product\ProductRepositoryInterface;

class ProductService
{


    protected $model;

    private static $_instance = null;

    /**
     * ProductService constructor.
     * @param ProductRepositoryInterface $lead
     */
    public function __construct(ProductRepositoryInterface $lead)
    {
        
        $this->model = $lead;
    }

    /**
     * @return ProductRequest
     */
    protected function getRequest()
    {
        return  new ProductRequest();
    }

    /**
     * @return ProductRepositoryInterface|null
     */
    public function getInstance()
    {

        if (is_null(self::$_instance)) {
            self::$_instance = $this->model;
        }

        return self::$_instance;
    }

    /**
     * @param $method
     * @param $data
     */
    public function execute($method, $data)
    {

        if (method_exists($this, $method)) {
            return $this->$method($data);
        }
        return;
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

}
