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
        <form action="/products" method="GET">
            <input type="text" name="search" class="search-form__input" placeholder="商品名で検索">
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
            @if (request('sort'))
            <div class="sort-tag">
                @if (request('sort') === 'asc')
                <span>
                    低い順に表示
                </span>
                @endif
                @if (request('sort') === 'desc')
                <span>
                    高い順に表示
                </span>
                @endif
                <a href="/products?search={{ request('search') }}"
                class="sort-tag__reset">
                ×
                </a>
            </div>
        @endif
        </form>
    </div>
    <div class="product-list__content">
        <div class="product-list__header">
            <a href="#" class="add-button">
                + 商品を追加
            </a>
        </div>
            <div class="product-card__wrap">
                @foreach ($products as $product)
                <a href="/products/detail/{{ $product->id }}"
                class="product-card">
                    <img
                    src="{{ asset($product['image']) }}"
                    alt="{{ $product['name'] }}"
                    class="product-card__image">

                    <div class="product-card__content">
                        <p class="product-card__name">
                            {{ $product['name'] }}
                        </p>
                        <p class="product-card__price">
                            ¥{{ number_format($product['price']) }}
                        </p>
                    </div>
                </a>
                @endforeach
                <div class="pagination">
                    {{ $products->onEachSide(1)->links() }}
                </div>
        </div>

    </div>

</div>

@endsection


