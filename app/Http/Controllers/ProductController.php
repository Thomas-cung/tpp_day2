<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

//     public function store(ProductStoreRequest $request)
// {
//     $data = $request->validated();

//     if ($request->hasFile('image')) {
//         $imageName = time() . '.' . $request->image->extension();
//         $request->image->move(public_path('productImages'), $imageName);

//         $data['image'] = $imageName; 
//     }

//     Product::create($data);

//     return redirect()->route('products.index');
// }
public function store(ProductStoreRequest $request)
{
    $data = $request->validated();

    if ($request->hasFile('image')) {

        $imagePath = $request->file('image')
                             ->store('products', 'public');

        $data['image'] = $imagePath;
    }

    Product::create($data);

    return redirect()->route('products.index');
}

    public function edit($id){
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $data = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required',
        'image' => 'required',
    ]);

    $product->update($data);

    return redirect()->route('products.index');
}

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->route('products.index');
    }
}