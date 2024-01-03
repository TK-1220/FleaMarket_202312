<?php
$prices = array();
for ($i=0; $i<50000; $i=$i+5000) { array_push($prices, [$i, $i+5000]); }
?>
@extends('layouts.layout')
@section('content')

<main>
    <h1>Flea Market</h1>

    <form action={{ route("main.index") }} method="post">
        @csrf
        <div>
            <label for='name'>キーワード</label>
            <input type="text" class='form-control' name='keyword' value={{ $keyword }} >
        </div>
        <div>
            <label for='type'>価格</label>
            <select name='price' class='form-control'>
                <option value=''>価格帯</option>
                @foreach($prices as $price)
                <option value={{ $price[0] }}> {{ $price[0] }}円 ~ {{ $price[1] }}円 </option>
                @endforeach
            </select>
        </div>
        <button type='submit'>検索</button>
    </form>

    <h2>出品一覧</h2>
    @foreach($datalist as $data)
    @if($data['del_flg'] == 0)
    <div>
        <h3>出品名：
            <a href="{{ route('detail.display', ['displayId' => $data['id']]) }}">{{ $data['name'] }}</a>
        </h3>
        <div>
            <img src="{{ asset( $data['image']) }}" width="400">
        </div>
        <label for='price'>{{ $data['price'] }}円</label>
        <a href="{{ route('detail.display', ['displayId' => $data['id']]) }}">詳細</a>
        <a href="{{ route('main.handler', ['displayId' => $data['id']]) }}">
            <button>購入</button>
        </a>
    </div>


    @if($like_model->like_exist(Auth::user()->id, $data->id))
    <p class="favorite-marke">
        <a class="js-like-toggle loved" href="" data-displayid="{{ $data->id }}">いいね<i class="fas fa-heart"></i></a>
        <span class="likesCount">{{$data->likes_count}}</span>
    </p>
    @else
    <p class="favorite-marke">
        <a class="js-like-toggle" href="" data-displayid="{{ $data->id }}">いいね<i class="fas fa-heart"></i></a>
        <span class="likesCount">{{$data->likes_count}}</span>
    </p>
    @endif
    @endif
    <input type='hidden' name='display_id' value={{ $data->id }}>
    @endforeach

</main>




​

@endsection




