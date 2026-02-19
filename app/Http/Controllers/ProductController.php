<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function create(){
        $categories = Category::get();
        return view('products.create', compact('categories'));
    }


public function store(ProductStoreRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('image'))
        {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('productImages'), $imageName);

            $data = array_merge($data, ['image' => $imageName]);
        }
        $data['status'] = $request->has('status') ? true : false;

    $data['category_id'] = $request->category_id;
    Product::create($data);

    return redirect()->route('products.index');
}

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', compact('product','categories'));
    }
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required',
        'category_id'=>'required',
        'status'=>'required',
        'image' => 'nullable|image',
    ]);
    $product = Product::findOrFail($id);

    // $product->update([
    //     'name' => $request->name,
    //     'description' => $request->description,
    //     'price' => $request->price,
    //     'status' => $request->status, // this was probably missing
    // ]);
    $data['status'] = $request->has('status') ? '1' : '0';
    $product->update($data);

    return redirect()->route('products.index');
}

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}