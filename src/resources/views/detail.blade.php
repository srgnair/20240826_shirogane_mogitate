@extends('common')
@section('title')
<title>商品一覧ページ</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection
@section('content')

<div class="container">
    <div class="detail">
        <div class="detail__map">
            商品一覧＞キウイ
        </div>
        <div class="detail__top">
            <div class="detail__top--img">
                <img src="{{ asset('storage/images/kiwi.png') }}" alt="">
            </div>
            <div class="detail__top--form-wrapper">
                <div class="detail__top--form">
                    <p>商品名</p>
                    <input type="text" name="name" placeholder="商品名を入力">
                </div>
                <div class="detail__top--form">
                    <p>値段</p>
                    <input type="number" name="price" placeholder="値段を入力">
                </div>
                <div class="detail__top--select">
                    <p>季節</p>
                    <div class="checkbox-wrapper">
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
            </div>
        </div>
        <div class="detail__file">
            <input type="file">
        </div>
        <div class="detail__description">
            <p>商品説明</p>
            <textarea name="description" placeholder="商品の説明を入力"></textarea>
        </div>
        <div class="detail__button">
            <div class="back-button">
                <button>
                    戻る
                </button>
            </div>
            <div class="register-button">
                <button>
                    変更を保持
                </button>
            </div>
        </div>
    </div>
</div>

@endsection