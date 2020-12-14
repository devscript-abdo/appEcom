<?php
/**
 * Author    : Elmarzougui Abdelghafour (Haymacproduction)
 * website   : https://www.elmarzougui.com
 * linkedin  : https://www.linkedin.com/in/devscript/
 * facebook  : https://www.facebook.com/devscript
 * twitter   : https://twitter.com/devscriptt
 * createdAt : 13/décembre/2020
 **/

namespace App\Settings;


use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{

    public string $site_name;

    public string $hookCSRF;

    public bool $site_active;

    public static function group(): string
    {
        return 'general';
    }

    public static function encrypted(): array
    {
        return [
            'hookCSRF'
        ];
    }
}
