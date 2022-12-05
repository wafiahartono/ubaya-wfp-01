<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $all = $request->has('all');
        $view = $request->input('view', 'table');
        $products = Product::withTrashed($all)->orderBy('name')->get();
        return view('product.index', compact('view', 'products'));
    }

    public function create(Request $request)
    {
        $ajax = $request->has('ajax');
        $categories = Category::orderBy('name')->get();
        return view($ajax ? 'product.create-ajax' : 'product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $ajax = $request->has('ajax');
        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->save();
        session()->put('message', 'Product successfully created');
        if ($ajax) {
            $product->created_at = $product->created_at->toString();
            $product->updated_at = $product->updated_at->toString();
            $product->load('category');
            return $product;
        } else {
            return redirect()->route('products.index');
        }
    }

    public function show(Product $product) // Ajax call
    {
        return response()->json(compact('product'));
    }

    public function edit(Request $request, Product $product)
    {
        $ajax = $request->has('ajax');
        $categories = Category::orderBy('name')->get();
        $data = compact('product', 'categories');
        return view($ajax ? 'product.edit-ajax' : 'product.edit', $data);
    }

    public function update(Request $request, Product $product)
    {
        $product->name = $request->input('name');
        $product->category_id = $request->input('category');
        $product->save();
        session()->put('message', 'Product successfully updated');
        return redirect()->route('products.index');
    }

    public function destroy(Request $request, Product $product) // Ajax call
    {
        $permanent = $request->input('permanent') === 'true';
        if ($permanent) $product->forceDelete();
        else $product->delete();
        session()->put('message', 'Product ' . ($permanent ? 'permanently ' : '') . 'deleted');
    }
}
