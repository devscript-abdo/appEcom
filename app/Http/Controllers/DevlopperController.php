<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Command;
use App\Models\Delivery;
use App\Models\Group;
use App\Models\Lead;
use App\Models\Moderator;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Todo;
use App\Models\User;

use Illuminate\Support\Facades\DB;
class DevlopperController extends Controller
{
    //

    public function truncateData()
    {
        DB::table('webhook_calls')->truncate();
      /*  Admin::truncate();
        Moderator::truncate();
        Delivery::truncate();
        User::truncate();

        Product::truncate();
        Group::truncate();
        Lead::truncate();
        Command::truncate();
        Todo::truncate();
        Category::truncate();
        Product::truncate();

        Setting::truncate();*/
        return redirect()->route('admin.products');

    }
}
