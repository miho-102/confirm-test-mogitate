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
        ->get();

        return view('index', compact('products'));
    }
}
