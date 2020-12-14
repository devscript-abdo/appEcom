<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 11/décembre/2020
 **/

namespace App\Hooks\Validator;

use App\Hooks\Validator\Repository\ValidatorHookRepository;

class CustomSignatureValidatorHook extends ValidatorHookRepository
{

    public function __construct()
    {
        $this->setState(false);
    }
}
