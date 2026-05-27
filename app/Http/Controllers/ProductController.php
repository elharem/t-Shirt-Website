<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->with('category')->paginate(12);
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('category');
        $related = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(4)
            ->get();
        return view('products.show', compact('product', 'related'));
    }
    public function search(\Illuminate\Http\Request $request)
{
    $query = trim($request->input('q', ''));

    $products = \App\Models\Product::query()
        ->where('is_active', true)
        ->when($query, function ($builder) use ($query) {
            $builder->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhereHas('category', fn($c) => $c->where('name', 'like', "%{$query}%"));
            });
        })
        ->with('category')
        ->latest()
        ->paginate(12)
        ->withQueryString();

    return view('products.search', compact('products', 'query'));
}
}
