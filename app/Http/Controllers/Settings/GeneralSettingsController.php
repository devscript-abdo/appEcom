<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\General\GeneralRequest;
use App\Settings\GeneralSettings;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    //

    public function update(
        GeneralRequest $request,
        GeneralSettings $settings
    ) {
        $settings->site_name = $request->input('site_name');
        $settings->site_active = $request->input('site_active');

        $settings->save();

        return redirect()->back();
    }
}
