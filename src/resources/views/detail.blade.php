@extends('common')
@section('title')
<title>商品詳細ページ</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<script src="https://kit.fontawesome.com/ada21263c2.js" crossorigin="anonymous"></script>
@endsection
@section('content')

<div class="container">
    <div class="detail">
        <form action="{{ route('update', ['productId' => $product->id]) }}" method="POST" enctype='multipart/form-data'>
            @csrf
            <div class="detail__map">
                商品一覧＞{{$product->name}}
            </div>
            <div class="detail__top">
                <div class="detail__top--img">
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="">
                </div>
                <div class="detail__top--form-wrapper">
                    <div class="detail__top--form">
                        <p>商品名</p>
                        <input type="text" name="name" placeholder="商品名を入力" value="{{$product->name}}">
                        @if ($errors->has('name'))
                        @foreach ($errors->get('name') as $error)
                        <span class="error-message">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="detail__top--form">
                        <p>値段</p>
                        <input type="number" name="price" placeholder="値段を入力" value="{{$product->price}}">
                        @if ($errors->has('price'))
                        @foreach ($errors->get('price') as $error)
                        <span class="error-message">{{ $error }}</span>
                        @endforeach
                        @endif
                    </div>
                    <div class="detail__top--select">
                        <p>季節</p>
                        <div class="checkbox-wrapper">
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
                </div>
            </div>
            <div class="detail__file">
                <input type="file"><br>
                @if ($errors->has('image'))
                @foreach ($errors->get('image') as $error)
                <span class="error-message">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="detail__description">
                <p>商品説明</p>
                <textarea name="description" placeholder="商品の説明を入力">{{$product->description}}</textarea>
                @if ($errors->has('description'))
                @foreach ($errors->get('description') as $error)
                <span class="error-message">{{ $error }}</span>
                @endforeach
                @endif
            </div>
            <div class="detail__button">
                <div class="back-button">
                    <a href="{{ route('listView') }}">
                        <button type="button">
                            戻る
                        </button>
                    </a>
                </div>
                <div class="register-button">
                    <button type="submit">
                        変更を保持
                    </button>
                </div>
            </div>
        </form>
        <div class="register__trash">
            <form action="{{ route('delete', ['productId' => $product->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"><i class="fa-regular fa-trash-can fa-2xl" style="color: red;"></i></button>
            </form>
        </div>
    </div>
</div>

@endsection