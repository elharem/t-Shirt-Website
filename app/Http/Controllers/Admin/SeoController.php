<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $shareUrl = url('/');

        $seo = [
            'site_title'       => SeoSetting::get('site_title', config('app.name')),
            'site_description' => SeoSetting::get('site_description', 'Boutique de t-shirts en ligne — designs uniques, qualité premium.'),
            'site_keywords'    => SeoSetting::get('site_keywords', 't-shirt, boutique, mode, belgique'),
            'og_image'         => SeoSetting::get('og_image', ''),
            'google_analytics' => SeoSetting::get('google_analytics', ''),
            'twitter_handle'   => SeoSetting::get('twitter_handle', ''),
        ];

        return view('admin.seo', compact('products', 'shareUrl', 'seo'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'site_title'       => 'required|string|max:70',
            'site_description' => 'required|string|max:160',
            'site_keywords'    => 'nullable|string|max:500',
            'og_image'         => 'nullable|max:500',
            'google_analytics' => 'nullable|string|max:50',
            'twitter_handle'   => 'nullable|string|max:50',
        ]);

        SeoSetting::setMany($data);

        return back()->with('success', '✓ Paramètres SEO enregistrés !');
    }
}