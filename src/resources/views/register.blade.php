@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register">
    <div class="register__inner">
        <h1 class="register__title">商品登録</h1>

        <form class="register-form" action="/products/register" method="post" enctype="multipart/form-data">
            @csrf

            <div class="register-form__group">
                <label class="register-form__label">
                    商品名 <span class="register-form__required">必須</span>
                </label>
                <input class="register-form__input" type="text" name="name" placeholder="商品名を入力">
                @error('name')
                <p class="register-form__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    値段 <span class="register-form__required">必須</span>
                </label>
                <input class="register-form__input" type="text" name="price" placeholder="値段を入力">
                @error('price')
                <p class="register-form__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    商品画像 <span class="register-form__required">必須</span>
                </label>
                <img id="preview" src="" alt="画像プレビュー" style="width: 200px; display: none; margin-top: 10px;">
                <input class="register-form__file" type="file" name="image" id="image-input" accept="image/*">
                @error('image')
                <p class="register-form__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    季節
                    <span class="register-form__required">必須</span>
                    <span class="register-form__note">複数選択可</span>
                </label>

                <div class="register-form__radio-group">
                    @foreach ($seasons as $season)
                    <label>
                        <input type="checkbox" name="seasons[]" value="{{ $season->id }}">
                        <span>{{ $season->name }}</span>
                    </label>
                    @endforeach
                </div>
                @error('seasons')
                <p class="register-form__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="register-form__group">
                <label class="register-form__label">
                    商品説明 <span class="register-form__required">必須</span>
                </label>
                <textarea class="register-form__textarea" name="description" placeholder="商品の説明を入力"></textarea>
                @error('description')
                <p class="register-form__error">{{ $message }}</p>
                @enderror
            </div>

            <div class="register-form__buttons">
                <a href="/products" class="register-form__back">戻る</a>
                <button class="register-form__submit" type="submit">登録</button>
            </div>
        </form>

        <script>
        const imageInput = document.getElementById('image-input');
        const preview = document.getElementById('preview');
        imageInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });
        </script>
    </div>
</div>
@endsection