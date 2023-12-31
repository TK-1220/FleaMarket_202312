<?php

?>


<main>
    <h1>マイページ</h1>

    @if(empty(Auth::user()->image))
        <img src="{{ asset('storage/sample.png') }}" width="100" >
    @else
        <img src="{{ asset( Auth::user()->image) }}" width="100" >
    @endif

    <div class='container'>
        <label for='user_name'>{{ Auth::user()->name }}</label>
        <a href="{{ route('mypage.edit', ['user_id' => Auth::user()->id]) }}">編集</a>

        {{-- <a href="{{ route('following' )}}">フォロー数</a> --}}
        <a href="#">フォロー数</a>
    </div>

    <label for='profile'>{{ Auth::user()->profile }}</label>
    <a href="{{ route('register.display') }}">
        <button class='btn'>出品登録</button>
    </a>

    <div>
        <button>出品一覧</button>
        /
        <button>購入一覧</button>
    </div>

    @foreach ($displays as $display)
        <img src="{{ asset($display['image']) }}" width="200" >
        <div>
            <label name='name'>{{ $display['name'] }}</label>
        </div>
        <div>
            <a href="{{ route('detail.display', ['displayId' => $display['id']]) }}">商品詳細</a>
        </div>
    @endforeach

    <a href="{{ route('main.index') }}">
        <button class='btn'>メインページへ戻る</button>
    </a>


</main>






