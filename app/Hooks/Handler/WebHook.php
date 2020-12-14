<?php

/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 11/décembre/2020
 **/

namespace App\Hooks\Handler;


use App\Hooks\Repository\HookRepository;
use App\Http\Controllers\Hooks\Elementor\ElementorHookController;
use App\Http\Controllers\Hooks\ClickFunnels\ClickFunnelsHookController;

class WebHook extends HookRepository
{


    public function __invoke()
    {
        $this->wpElementor();
    }

    public function clickFunnels()
    {
        return new ClickFunnelsHookController($this->webhookCall);
    }

    public function wpElementor()
    {
        return new ElementorHookController($this->webhookCall);
    }
}
