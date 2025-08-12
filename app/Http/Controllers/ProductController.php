<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //show all products
    function index()
    {
        return view('products.index', [
            'products' => Product::with('user', 'category')->latest()->get()
        ]);
    }


    //show single product

    function single(Product $product)
    {
        // Load category এবং user relationship
        $product->load('category', 'user');

        // Similar products বের করা
        $similar = Product::with('user', 'category')
            ->where('category_id', $product->category_id) // একই category
            ->where('id', '!=', $product->id) // বর্তমান product বাদ
            ->latest()
            ->get();

        return view('products.single', [
            'product' => $product,
            'similars' => $similar
        ]);
    }


    //create Product related function

    function create()
    {
        return view('products.create', [
            'categories' => Category::latest()->get(),
            'users' => User::latest()->get()
        ]);
    }

    function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        Product::create($validated);
        return redirect()->route('products.index')->with('success', 'Product saved successfully');
    }

    //update Product related function
    function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product->load('user', 'category'),
            'categories' => Category::latest()->get(),
            'users' => User::latest()->get()
        ]);
    }

    function update(Product $product, UpdateProductRequest $request) {
        $validated= $request->validated();
        $product->updateOrFail($validated);
        return redirect()->route('products.index')->with('success', 'Product Update SUccessfully');
    }

    //delete Product related function
    function destroy( Product $product){
        $product->deleteOrFail();
        return redirect()->route('products.index')->with('success', 'Product Delete Successfully');

    }
}
