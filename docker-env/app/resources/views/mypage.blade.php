<?php
// $icon_image_file = './../../../images/icon_sample_001.png';
// $icon = true;
$user_name = 'User Name Sample';

echo 'test mypage';

?>


<main>
    <h1>mypage</h1>


    <img src="{{ asset('storage/sample.png') }}">

    <div class='container'>
        <label for='user_name'>{{ $user_name }}</label>

        <a href="{{ route('my.edit') }}">編集</a>
        {{-- <a href="{{ route('following' )}}">フォロー数</a> --}}
        <a href="#">フォロー数</a>

    </div>

    <label for='profile'>sample sample sample</label>
    <a href="{{ route('register.display') }}">
        <button class='btn'>出品登録</button>
    </a>


    <div>
        <button>出品一覧</button>
        /
        <button>購入一覧</button>
    </div>

    <img src="{{ asset('storage/sample.png') }}" >
    <div>
        <a href='#'>商品詳細</a>
    </div>

</main>






