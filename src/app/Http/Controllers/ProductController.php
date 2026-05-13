<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $product = Product::with('seasons')->findOrFail($productId);
        $seasons = Season::all();
        return view('show', compact('product', 'seasons'));
        }

    public function create()
    {
        $seasons = Season::all();

        return view('register', compact('seasons'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => [
            'required',
        ],
        'price' => [
            'required',
            'integer',
            'between:0,10000',
        ],
        'image' => [
            'required',
            'mimes:png,jpeg',
        ],
        'seasons' => [
            'required',
        ],
        'description' => [
            'required',
            'max:120',
        ],
        ],[
        'name.required' => '商品名を入力してください',

        'price.required' => '値段を入力してください',
        'price.integer' => '値段は数値で入力してください',
        'price.between' => '0~10000円以内で入力してください',

        'image.required' => '商品画像を登録してください',
        'image.mimes' => '.png または .jpeg 形式でアップロードしてください',

        'seasons.required' => '季節を選択してください',

        'description.required' => '商品説明を入力してください',
        'description.max' => '120文字以内で入力してください',
    ]);
        $imagePath = $request->file('image')->store('products', 'public');
        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath,
    ]);
        $product->seasons()->attach($request->seasons);
        return redirect('/products');
    }

    public function update(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $request->validate([
        'name' => ['required'],
        'price' => ['required', 'integer', 'between:0,10000'],
        'image' => ['nullable', 'mimes:png,jpeg'],
        'seasons' => ['required'],
        'description' => ['required', 'max:120'],
    ], [
        'name.required' => '商品名を入力してください',
        'price.required' => '値段を入力してください',
        'price.integer' => '値段は数値で入力してください',
        'price.between' => '0~10000円以内で入力してください',
        'image.mimes' => '.png または .jpeg 形式でアップロードしてください',
        'seasons.required' => '季節を選択してください',
        'description.required' => '商品説明を入力してください',
        'description.max' => '120文字以内で入力してください',
    ]);

    $imagePath = $product->image;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    $product->seasons()->sync($request->seasons);
    return redirect('/products');
    }
}
