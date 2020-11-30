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


use App\Http\Requests\CityRequest;
use App\Repositories\City\CityRepositoryInterface;

class CityService extends Servicer
{

    protected $model;
    protected static $_instance = null;
    public function __construct(CityRepositoryInterface $model)
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

        return new CityRequest();
    }

}
