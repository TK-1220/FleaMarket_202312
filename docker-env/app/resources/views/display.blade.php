<?php

$price = 500;
?>

<main>
    <h1>購入商品一覧</h1>

    <img src="{{ asset('storage/sample.png') }}">

    <label name='display_name'>商品名</label>
    <label name='display_comment'>comment</label>
    <label name='price'>値段: {{$price}} 円</label>
    <a herf='#'>削除</a>


    <label>合計金額</label>
    <button>購入</button>

    <a href="{{ route('main.index') }}">
        <button>メインページへ戻る</button>
    </a>



</main>






