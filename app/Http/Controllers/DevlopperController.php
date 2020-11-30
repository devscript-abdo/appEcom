<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Command;
use App\Models\Group;
use App\Models\Lead;
use App\Models\Product;
use App\Models\Todo;
use Illuminate\Http\Request;

class DevlopperController extends Controller
{
    //

    public function truncateData()
    {

       // Admin::truncate();
        Product::truncate();
        Group::truncate();
        Lead::truncate();
        Command::truncate();
        Todo::truncate();
        Category::truncate();
        return redirect()->route('admin.products');

    }
}
