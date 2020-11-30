<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class FunctionNotFoundException extends Exception
{
    //

    private $errors;

    public function __construct($errors)
    {
        $this->errors = $errors;
        parent::__construct();
    }

    public function report()
    {
        Log::error($this->errors);
    }

   /* public function render()
    {
        return view('errors.dataSource.index', ['errors' => $this->errors]);
    }*/
}
