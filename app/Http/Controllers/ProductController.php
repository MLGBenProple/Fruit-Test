<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Variety;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Variety $variety)
    {
        $products = $variety->products ?? [];
        return view('products.index', ['products' => $products, 'variety' => $variety]);
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {
        $product->update([
            'name' => $request->name,
        ]);
        return redirect(route('products.index', $product->variety->id));
    }

    public function store(Variety $variety, Request $request)
    {
        $variety->products()->create([
            'slug' => strtolower($request->name),
            'name' => $request->name,
        ]);
        return back();
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back();
    }
}
