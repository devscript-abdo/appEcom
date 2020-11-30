<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 13/novembre/2020
 **/

namespace App\Services;


use App\Exceptions\FunctionNotFoundException;

abstract class Servicer
{

    protected $model;

    protected $auth;


    /**
     * @param $method
     * @param $data
     * @return FunctionNotFoundException
     */
    public function execute(string $method, array $data)
    {

        if (method_exists($this, $method)) {
            return $this->$method($data);
        }
        return new FunctionNotFoundException("sorry the method : {$method}  not found");
    }


    /**
     * @return mixed
     */
    public function auth()
    {
        return $this->auth->getInstance()->loggedUser();
    }

    /**
     * @return mixed
     */
    public function authType(): string
    {

        return $this->auth->getInstance()->getLoggedUserType();
    }

}
