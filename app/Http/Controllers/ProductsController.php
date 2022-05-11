<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class ProductsController extends Controller
{
    public function create(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "product_name" => "required",
                "category_id" => "required",
                "description" => "required",
                "variation.*" => "required",
                "price.*" => "required",
                "stock_quantity.*" => "required",
                "product_img" => "required:mimes:jpg,png,jpeg|max:5048"
            ],
            [
                "product_name.required" => ".product-name",
                "category_id.required" => ".category-select",
                "description.required" => ".description",
                "variation.*.required" => ".variation",
                "price.*.required" => ".price-error",
                "stock_quantity.*.required" => ".stock-quantity",
                "product_img.required" => ".product-image"
            ]
        );
        $message = array();
        //check if validation fails
        if ($validator->fails()) {
            $message["success"] = false;
            $message["fieldRequiredError"] = true;
            $message["errors"] = $validator->getMessageBag()->toArray();
            return json_encode($message);
        }


        $file = $request->file("product_img")->getClientOriginalName();
        $originalName = pathinfo($file, PATHINFO_FILENAME);
        $extenstion = pathinfo($file, PATHINFO_EXTENSION);

        $newImageName = time() . '-' . $originalName . '.' . $extenstion;

        /* $isUploaded = $request->file("product_img")->move(public_path("product_images"), $newImageName); */
        /*  dd($request->all()); */

        DB::beginTransaction();

        try {
            $id =  DB::table('products')->insertGetId(
                [
                    "product_name" => $request->input("product_name"),
                    "category_id" => $request->input("category_id"),
                    "description" => $request->input("description"),
                    "product_image" => $newImageName,
                    "status" => $request->input("status")
                ]
            );

            $variations = array();
            $requestVariations = $request->input("variation");
            $requestPrice = $request->input("price");
            $requestQTY = $request->input("stock_quantity");
            for ($i = 0; $i < count($requestVariations); $i++) {
                $variations[] = [
                    "product_id" => $id,
                    "variation" => $requestVariations[$i],
                    "price" => $requestPrice[$i],
                    "stock_quantity" => $requestQTY[$i],

                ];
            }
            DB::table("variations")->insert($variations);
            $isUploaded = $request->file("product_img")->move(public_path("product_images"), $newImageName);
            DB::commit();
        } catch (\Throwable $th) {
            $message["success"] = false;
            $message["sqlError"] = true;
            $message["errorCode"] = $th->getCode();
            $message["errorMessage"] = $th->getMessage();

            DB::rollback();
        }

        return json_encode($message);
    }

    public function getAllProducts()
    {
        $products = DB::table("products")
            ->select("products.*", "category.category_name")
            ->join("category", "products.category_id", "=", "category.id")
            ->get();
        return $products;
    }

    public function getProductVariations($product_id)
    {
        $variations = DB::table("variations")
            ->select("*")
            ->where("product_id", "=", $product_id)
            ->limit(1)
            ->get();

        return $variations;
    }
}
