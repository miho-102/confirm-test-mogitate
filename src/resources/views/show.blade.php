@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/show.css') }}">
@endsection

@section('content')
@php
use Illuminate\Support\Str;
@endphp

<div class="product-detail">

    <p class="product-detail__breadcrumb">
        <a href="/products">
            商品一覧
        </a>
        ＞
        {{ $product->name }}
    </p>

    <form
    class="product-form"
    action="/products/{{ $product->id }}/update"
    method="POST"
    enctype="multipart/form-data">
    @csrf

        <div class="product-form__top">

            <div class="product-form__image-area">
                @if (Str::startsWith($product->image, 'products/'))
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    alt="{{ $product->name }}"
                    class="product-form__image">
                    @else
                    <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name }}"
                    class="product-form__image">
                    @endif
                <input type="file" name="image">

            </div>

            <div class="product-form__content">

                <div class="form-group">
                    <label class="form-group__label">
                        商品名
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $product->name) }}"
                        class="form-group__input">
                </div>

                <div class="form-group">
                    <label class="form-group__label">
                        値段
                    </label>

                    <input
                        type="text"
                        name="price"
                        value="{{ old('price', $product->price) }}"
                        class="form-group__input">
                </div>

                <div class="form-group">

                    <label class="form-group__label">
                        季節
                    </label>

                    <div class="season-group">
                        @foreach ($seasons as $season)
                        <label class="season-group__item">
                            <input
                            type="checkbox"
                            name="seasons[]"
                            value="{{ $season->id }}"
                            {{ $product->seasons->contains('id', $season->id) ? 'checked' : '' }} >
                            {{ $season->name }}
                        </label>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

        <div class="form-group">

            <label class="form-group__label">
                商品説明
            </label>

            <textarea
            name="description"
            class="form-group__textarea">{{ old('description', $product->description) }}</textarea>

        </div>

        <div class="product-form__button-area">

            <a href="/products" class="back-button">
                戻る
            </a>

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