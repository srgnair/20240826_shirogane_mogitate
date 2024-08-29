@extends('common')
@section('title')
<title>商品一覧ページ</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endsection
@section('content')

<div class="list">
    <div class="list__title">
        <h1>商品一覧</h1>
        <a href="{{ route('registerView') }}">
            <button>
                ＋ 商品を追加
            </button>
        </a>
    </div>
    <div class="list__main">
        <div class="list__main--sort">
            <input type="text" placeholder="商品名で検索">
            <button>
                検索
            </button>
            <p>価格順で表示</p>
            <select id="sort_by" name="sort_by">
                <option value="" disabled selected>価格で並び替え</option>
                <option value="high">高い順に表示</option>
                <option value="low">低い順に表示</option>
            </select>
            <hr>
        </div>
        <div class="list__main--cards">
            @foreach($products as $product)
            <a href="{{ route('detailView',['productId' => $product->id]) }}" class="cards__card">
                <div class="cards__card--img">
                    <img src="{{ asset('storage/images/' . $product->image) }}" alt="イメージ画像">
                </div>
                <div class="cards__card--footer">
                    <div class="card__footer--name">
                        {{$product->name}}
                    </div>
                    <div class="card__footer--price">
                        {{$product->price}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    <div class="list__pagination">
        <div class="list__patination--left">
        </div>
        <div class="list__pagination--right">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection