<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 15/novembre/2020
 **/

namespace App\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;

class EloquentRepository implements EloquentRepositoryInterface
{


    private $model;

    protected static $_instance;

    public function getModel(): Model
    {
        $this->model = Model::class;

    }

    protected function callModel(){
        if(is_null(self::$_instance)){

            self::$_instance = $this->model;

        }
        return self::$_instance;
    }
}
