<?php

?>

<main>
    <h1>商品詳細</h1>

    <img src="{{ asset('storage/sample.png') }}" name='display_img'>

    <div>
        <img src="{{ asset('storage/sample.png') }}" name='icon_img' width="100" height="100">
        <label name='user_name'>User Name Space</label>

        <form action="{{ route('detail.form') }}" method='post'>
            <button type='submit'>フォロー</button>
        </form>
        <textarea name='profile'>user profile text</textarea>
    </div>

    <div>
        <label name='detail_info'>$display_name</label>
        <label name='price'>$display_price</label>
    </div>

    <textarea name='display_comment'>comment</textarea>

    <a href="{{ route('main.index') }}">
        <button class='btn'>メインページへ戻る</button>
    </a>

</main>






