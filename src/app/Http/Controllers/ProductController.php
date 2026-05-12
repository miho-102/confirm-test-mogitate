<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::search($request->search)
        ->sortPrice($request->sort)
        ->paginate(6)
        ->appends($request->query());

        return view('index', compact('products'));
    }

    public function show($productId)
    {
        $product = Product::findOrFail($productId);
        return view('show', compact('product'));
    }
}
