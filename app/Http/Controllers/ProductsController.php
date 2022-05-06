<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{


    public function create(Request $request)
    {


        $request->validate([
            "product_img" => "required:mimes:jpg,png,jpeg|max:5048"
        ]);

        $file = $request->file("product_img")->getClientOriginalName();
        $originalName = pathinfo($file, PATHINFO_FILENAME);
        $extenstion = pathinfo($file, PATHINFO_EXTENSION);

        $newImageName = time() . '-' . $originalName . '.' . $extenstion;

        $test = $request->file("product_img")->move(public_path("product_images"), $newImageName);
        dd($test);

        DB::transaction(function(){

        });
    }
}
