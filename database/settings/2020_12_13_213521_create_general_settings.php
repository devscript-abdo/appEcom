<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'appCOD');
        $this->migrator->addEncrypted('general.hookCSRF', '123456789@');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.timezone', 'Africa/Casablanca');
    }
}
