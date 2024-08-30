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
        <form action="{{ route('register') }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class=" register__form--wrapper">
                <div class="register__form">
                    <p>商品名<span class="required">必須</span></p>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="商品名を入力">
                    @if ($errors->has('name'))
                    @foreach ($errors->get('name') as $error)
                    <span class="error-message">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>
                <div class="register__form">
                    <p>値段<span class="required">必須</span></p>
                    <input type="number" name="price" value="{{old('price')}}" placeholder="値段を入力">
                    @if ($errors->has('price'))
                    @foreach ($errors->get('price') as $error)
                    <span class="error-message">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>
                <div class="register__form">
                    <p>商品画像<span class="required">必須</span></p>
                    <input type="file" name="image">
                    @if ($errors->has('image'))
                    @foreach ($errors->get('image') as $error)
                    <span class="error-message">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>
                <div class="register__form">
                    <p>季節<span class="required">必須</span><span class="multiple">複数選択可</span></p>
                    <div class="register__form--select">
                        @foreach($seasons as $season)
                        <input type="checkbox" name="season_ids[]" value="{{ $season->id }}" id="{{ $season->id }}">
                        <label for="{{ $season->id }}"><span class="custom-checkbox"></span>{{ $season->name }}</label>
                        @endforeach
                    </div>
                    @if ($errors->has('season'))
                    @foreach ($errors->get('season') as $error)
                    <span class="error-message">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>
                <div class="register__form">
                    <p>商品説明<span class="required">必須</span></p>
                    <textarea name="description" placeholder="商品の説明を入力">{{old('description')}}</textarea>
                    @if ($errors->has('description'))
                    @foreach ($errors->get('description') as $error)
                    <span class="error-message">{{ $error }}</span>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="register__button">
                <div class="back-button">
                    <a href="{{ route('listView') }}">
                        <button type="button">
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