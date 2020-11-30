<?php

namespace App\Services;

use App\Http\Requests\CommandRequest;
use App\Models\Command;

class CommandService extends Servicer
{

    protected $model;

    protected $auth;

    protected static $_instance = null;
    /**
     * CommandService constructor.
     * @param Command $command
     * @param AuthService $auth
     */
    public function __construct(Command $command, AuthService $auth)
    {

        $this->model = $command;
        $this->auth = $auth;
    }

    /**
     * @return CommandRequest
     */
    protected function getRequest()
    {
        return new CommandRequest();
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
        if(is_null($data) || !is_array($data)){

            return false ;
        }

        $form = $this->getRequest();
        $form->merge($data);
        $data = $form->validate($form->rules());
        $command = $this->getInstance()->create($data);
        $command->product()->associate($data['product_id'])->save();
        $command->lead()->associate($data['lead_id'])->save();
        $command->{$this->authType()}()->associate($this->auth->getInstance()->loggedUserId())->save();
        return $command;
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
        $cmd = $this->getInstance()->findOrFail($data['id']);
        $form = $this->getRequest();
        $form->merge($data);
        $data = $form->validate($form->rules());
        return  $cmd->update($data);
    }


    /**
     * @param array $data
     * @return mixed
     */
    protected function alreadyCommanded(array $data)
    {
        if(is_null($data) || !is_array($data)){

            return false ;
        }
        if(is_null($data['lead']) || is_null($data['product'])){

            return false ;
        }
        return $this->getInstance()
            ->where('lead_id', $data['lead'])
            ->where('product_id', $data['product'])
            ->first();
    }

    /******Authorisations system  */
}
