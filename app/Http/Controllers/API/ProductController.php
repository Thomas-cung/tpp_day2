<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::get();

        $data = ProductResource::collection($products);

        return $this->success($data, "Product Retrieved Successfully", 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'        => 'required|string',
            'description' => 'required|string',
            'price'       => 'required',
            'image'       => 'required',
            'category_id' => 'required',
            'status'      => 'nullable|boolean'
        ]);
        if ($validator->fails()) {
            return $this->error("Validation Error", $validator->errors(), 422);
        }
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('productImages'), $imageName);
        }
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'status' => $request->status ?? 1,
        ]);
        return $this->success($product, "Product Created Successfully");
    }
}
