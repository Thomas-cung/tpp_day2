<?php

namespace App\Http\Controllers;

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

    public function store(Request $request){
        Product::create($request->all());

        return redirect()->route('products.index');
    }

    public function edit($id){
        $product = Product::find($id);

        return view('products.edit', compact('product'));
    }

     public function update(Request $request)
    {
        // dd('hree');
        $category = Product::find($request->id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' =>$request->price
        ]);

        return redirect()->route('products.index');

    }

    public function delete($id)
    {
        $category = Product::find($id);

        $category->delete();

        return redirect()->route('products.index');
    }
}