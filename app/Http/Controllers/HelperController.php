<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class HelperController extends Controller
{
    //
    public function fetchCategories()
    {
        $categories = Categories::all();

        return $categories;
    }
}
