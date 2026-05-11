@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<div class="product-list">
    <div class="product-list__sidebar">
        <h1 class="product-list__title">
            商品一覧
        </h1>
        <form action="{{ route('products.index') }}" method="GET">
            <input type="text" name="keyword" class="search-form__input" placeholder="商品名で検索">
            <button class="search-form__button">
                検索
            </button>
            <div class="sort-box">
                <p class="sort-box__label">
                    価格順で表示
                </p>

                <select name="sort" class="sort-box__select">
                    <option value="">価格で並べ替え</option>
                    <option value="asc">低い順に表示</option>
                    <option value="desc">高い順に表示</option>
                </select>
            </div>

        </form>
    </div>
    <div class="product-list__content">
        <div class="product-list__header">
            <a href="{{ route('products.create') }}" class="add-button">
                + 商品を追加
            </a>
        </div>
        <div class="product-card__wrap">


            @php
                $products = [
                    [
                        'name' => 'キウイ',
                        'price' => 800,
                        'image' => 'https://images.unsplash.com/photo-1585059895524-72359e06133a'
                    ],
                    [
                        'name' => 'ストロベリー',
                        'price' => 1200,
                        'image' => 'https://images.unsplash.com/photo-1464965911861-746a04b4bca6'
                    ],
                    [
                        'name' => 'オレンジ',
                        'price' => 850,
                        'image' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b'
                    ],
                    [
                        'name' => 'スイカ',
                        'price' => 700,
                        'image' => 'https://images.unsplash.com/photo-1563114773-84221bd62daa'
                    ],
                    [
                        'name' => 'ピーチ',
                        'price' => 1000,
                        'image' => 'https://images.unsplash.com/photo-1629828874514-3f4b2c4d4f5b'
                    ],
                    [
                        'name' => 'シャインマスカット',
                        'price' => 1400,
                        'image' => 'https://images.unsplash.com/photo-1537640538966-79f369143f8f'
                    ],
                ];
            @endphp

