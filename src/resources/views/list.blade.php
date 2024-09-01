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
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="keyword" placeholder="商品名で検索">
                <button type="submit">
                    検索
                </button>
                <p>価格順で表示</p>
                <select id="sort_by" name="sort_by">
                    <option value="" disabled selected>価格で並び替え</option>
                    <option value="high">高い順に表示</option>
                    <option value="low">低い順に表示</option>
                </select>
                <div class="modal">
                    @if(request('keyword'))
                    <form action="{{ route('resetKeyword') }}" method="GET" style="display: inline;">
                        @if(request('sort_by'))
                        <input type="hidden" name="sort_by" value="{{ request('sort_by') }}">
                        @endif
                        <button>
                            商品名: {{ request('keyword') }}
                            <span class="modal__reset-icon">&times;</span>
                        </button>
                    </form>
                    @endif
                    @if(request('sort_by') == 'high')
                    <form action="{{ route('resetSort') }}" method="GET" style="display: inline;">
                        @if(request('keyword'))
                        <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                        @endif
                        <button>
                            高い順に表示
                            <span class="modal__reset-icon">&times;</span>
                        </button>
                    </form>
                    @elseif(request('sort_by') == 'low')
                    <form action="{{ route('resetSort') }}" method="GET" style="display: inline;">
                        @if(request('keyword'))
                        <input type="hidden" name="keyword" value="{{ request('keyword') }}">
                        @endif
                        <button>
                            低い順に表示
                            <span class="modal__reset-icon">&times;</span>
                        </button>
                    </form>
                    @endif
                </div>
                <hr>
            </form>
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