<?php


?>
<span class="my-navbar-item">{{ Auth::user()->name }}</span>
/
<a href="#" id="logout" class="my-nabvar-item">ログアウト</a>

<main>
    <h1>商品詳細</h1>

    <img src="{{ asset($dis_img) }}" name='display_img'>

    <div>
        <img src="{{ asset($icon_img) }}" name='icon_img' width="100" height="100">
        <label name='user_name'>{{ $user['name'] }}</label>

        {{-- <form action="{{ route('detail.form') }}" method='post'> --}}
        <form action="#" method='post'>
            <button type='submit'>フォロー</button>
        </form>
        <textarea name='profile'>{{ $user['profile'] }}</textarea>
    </div>

    <div>
        <label name='name'>商品名: {{ $data['name'] }}</label>
        <label name='price'>値段： {{ $data['price'] }} 円</label>
    </div>
    <label name='comment'>商品説明</label>
    <textarea name='comment'>{{ $data['comment'] }}</textarea>

    @if($data['user_id'] == Auth::user()->id)
    <a href="#">編集</a>
    @else
    @endif

    <a href="{{ route('main.index') }}">
        <button class='btn'>メインページへ戻る</button>
    </a>

</main>






