@extends('common')
@section('title')
<title>商品登録ページ</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection
@section('content')

<div class="container">
    @error('name')
    <span>{{ $message }}</span>
    @enderror
    @error('price')
    <span>{{ $message }}</span>
    @enderror
    @error('image')
    <span>{{ $message }}</span>
    @enderror
    <div class="register">
        <div class="register__title">
            <h1>商品登録</h1>
        </div>
        <form action="{{ route('register') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class=" register__form--wrapper">
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
                        @foreach($seasons as $season)
                        <input type="checkbox" name="season_ids[]" value="{{ $season->id }}" id="{{ $season->id }}">
                        <label for="{{ $season->id }}"><span class="custom-checkbox"></span>{{ $season->name }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="register__form">
                    <p>商品説明<span class="required">必須</span></p>
                    <textarea name="description" placeholder="商品の説明を入力"></textarea>
                </div>
            </div>
            <div class="register__button">
                <div class="back-button">
                    <a href="{{ route('listView') }}">
                        <button>
                            戻る
                        </button>
                    </a>
                </div>
                <div class="register-button">
                    <button type="submit">
                        登録
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection