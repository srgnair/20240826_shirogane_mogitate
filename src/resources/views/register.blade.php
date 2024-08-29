@extends('common')
@section('title')
<title>商品登録ページ</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')

<div class="container">
    <div class="register">
        <div class="register__title">
            <h1>商品登録</h1>
        </div>
        <div class="register__form--wrapper">
            <div class="register__form">
                <p>商品名<span class="required">必須</span></p>
                <input type="text" name="name" placeholder="商品名を入力">
            </div>
            <div class="register__form">
                <p>値段<span class="required">必須</span></p>
                <input type="number" name="price" placeholder="値段を入力">
            </div>
            <div class="register__form">
                <p>商品画像<span class="required">必須</span></p>
                <input type="file" name="image">
            </div>
            <div class="register__form">
                <p>季節<span class="required">必須</span><span class="multiple">複数選択可</span></p>
                <div class="register__form--select">
                    <input type="checkbox" name="season" value="春" id="spring">
                    <label for="spring"><span class="custom-checkbox"></span>春</label>
                    <input type="checkbox" name="season" value="夏" id="summer">
                    <label for="summer"><span class="custom-checkbox"></span>夏</label>
                    <input type="checkbox" name="season" value="秋" id="autumn">
                    <label for="autumn"><span class="custom-checkbox"></span>秋</label>
                    <input type="checkbox" name="season" value="冬" id="winter">
                    <label for="winter"><span class="custom-checkbox"></span>冬</label>
                </div>
            </div>
            <div class="register__form">
                <p>商品説明<span class="required">必須</span></p>
                <textarea name="description" placeholder="商品の説明を入力"></textarea>
            </div>
        </div>
        <div class="register__button">
            <div class="back-button">
                <button>
                    戻る
                </button>
            </div>
            <div class="register-button">
                <button>
                    登録
                </button>
            </div>
        </div>
    </div>
</div>

@endsection