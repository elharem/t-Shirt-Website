<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->input('sort', 'newest');

    $query = Product::where('is_active', true)->with('category');

    match($sort) {
        'price_asc'  => $query->orderBy('price', 'asc'),
        'price_desc' => $query->orderBy('price', 'desc'),
        'name_asc'   => $query->orderBy('name', 'asc'),
        'name_desc'  => $query->orderBy('name', 'desc'),
        default      => $query->latest(),
    };

    $products = $query->paginate(12)->withQueryString();

    return view('products.index', compact('products', 'sort'));
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
