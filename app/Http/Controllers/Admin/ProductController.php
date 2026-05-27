<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->paginate(15);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data = $this->processArrays($data);
        if ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('products', 'public');
        }
        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Produit créé.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateData($request);
        $data = $this->processArrays($data);
        if ($request->hasFile('image_file')) {
            $data['image'] = $request->file('image_file')->store('products', 'public');
        }
        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produit supprimé.');
    }

    protected function validateData(Request $request): array
    {
        return $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
            'image_file' => 'nullable|image|max:2048',
            'sizes_csv' => 'nullable|string',
            'colors_csv' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);
    }

    protected function processArrays(array $data): array
    {
        $data['is_active'] = !empty($data['is_active']);
        $data['sizes'] = !empty($data['sizes_csv'])
            ? array_map('trim', explode(',', $data['sizes_csv']))
            : null;
        $data['colors'] = !empty($data['colors_csv'])
            ? array_map('trim', explode(',', $data['colors_csv']))
            : null;
        unset($data['sizes_csv'], $data['colors_csv'], $data['image_file']);
        return $data;
    }
}
