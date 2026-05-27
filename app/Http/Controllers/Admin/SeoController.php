<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;

class SeoController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $shareUrl = url('/');
        return view('admin.seo', compact('products', 'shareUrl'));
    }
}
