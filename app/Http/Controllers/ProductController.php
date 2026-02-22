<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Laravel\Prompts\Concerns\Fallback;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|min:0',
            'image' => 'required|image',
            'category_id' => 'required',
            'status' => 'nullable'
        ]);

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('productImages'), $imageName);
            $data['image'] = $imageName;
        }

        $data['status'] = $request->has('status') ? true : false;

        $data['category_id'] = $request->category_id;

        Product::create($data);
        return redirect()->route('products.index');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required',
            'category_id' => 'required',
            'status' => 'nullable',
        ]);

        // dd($data);
        $product = Product::find($id);
        // dd($product);
        $data['category_id'] = $request->category_id;

        $data['status'] = $request->has(key: 'status') ? true : false;

        $product->update($data);

        return redirect()->route('products.index');
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}
