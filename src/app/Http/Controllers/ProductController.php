<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Season;

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

    public function create()
    {
        $seasons = Season::all();

        return view('register', compact('seasons'));
    }

    public function store(Request $request)
    {
    $product = Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $request->image,
    ]);

    $product->seasons()->attach($request->seasons);

    return redirect('/products');
    }
}
