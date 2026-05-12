@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="register__inner">
        <h1 class="register__title">商品登録</h1>

        <form class="register-form" action="" method="post" enctype="multipart/form-data">
            @csrf

            <div class="register-form__group">
                <label class="register-form__label">
                    商品名 <span class="register-form__required">必須</span>
                </label>
                <input class="register-form__input" type="text" name="name" placeholder="商品名を入力">
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    値段 <span class="register-form__required">必須</span>
                </label>
                <input class="register-form__input" type="text" name="price" placeholder="値段を入力">
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    商品画像 <span class="register-form__required">必須</span>
                </label>
                <input class="register-form__file" type="file" name="image">
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    季節
                    <span class="register-form__required">必須</span>
                    <span class="register-form__note">複数選択可</span>
                </label>

                <div class="register-form__radio-group">
                    <label><input type="checkbox" name="season[]" value="春"><span>春</span></label>
                    <label><input type="checkbox" name="season[]" value="夏"><span>夏</span></label>
                    <label><input type="checkbox" name="season[]" value="秋"><span>秋</span></label>
                    <label><input type="checkbox" name="season[]" value="冬"><span>冬</span></label>
                </div>
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    商品説明 <span class="register-form__required">必須</span>
                </label>
                <textarea class="register-form__textarea" name="description" placeholder="商品の説明を入力"></textarea>
            </div>

            <div class="register-form__buttons">
                <a href="/products" class="register-form__back">戻る</a>
                <button class="register-form__submit" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection