@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')

<div class="product-detail">

    <p class="product-detail__breadcrumb">
        <a href="/products">
            商品一覧
        </a>
        ＞
        {{ $product->name }}
    </p>

    <form class="product-form">

        <div class="product-form__top">

            <div class="product-form__image-area">

                <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name }}"
                    class="product-form__image">

                <input type="file">

            </div>

            <div class="product-form__content">

                <div class="form-group">
                    <label class="form-group__label">
                        商品名
                    </label>

                    <input
                        type="text"
                        value="{{ $product->name }}"
                        class="form-group__input">
                </div>

                <div class="form-group">
                    <label class="form-group__label">
                        値段
                    </label>

                    <input
                        type="text"
                        value="{{ $product->price }}"
                        class="form-group__input">
                </div>

                <div class="form-group">

                    <label class="form-group__label">
                        季節
                    </label>

                    <div class="season-group">

                        <label>
                            <input type="radio" name="season">
                            春
                        </label>

                        <label>
                            <input type="radio" name="season">
                            夏
                        </label>

                        <label>
                            <input type="radio" name="season">
                            秋
                        </label>

                        <label>
                            <input type="radio" name="season">
                            冬
                        </label>

                    </div>

                </div>

            </div>

        </div>

        <div class="form-group">

            <label class="form-group__label">
                商品説明
            </label>

            <textarea class="form-group__textarea">{{ $product->description }}</textarea>

        </div>

        <div class="product-form__button-area">

            <button type="button" class="back-button">
                戻る
            </button>

            <button type="submit" class="save-button">
                変更を保存
            </button>

            <button type="button" class="delete-button">
                🗑
            </button>

        </div>

    </form>

</div>

@endsection