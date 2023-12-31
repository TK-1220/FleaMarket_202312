<?php
$price_list = [
['0', '1000'],
['1000', '2000'],
['2000', '3000'],
['3000', '4000'],
['4000', '5000'],
];


?>

@if(Auth::check())
<span class="my-navbar-item">{{ Auth::user()->name }}</span>
/
<a href="{{ route('mypage.index', ['user_id' => Auth::user()->id]) }}" id='mypage'>マイページ</a>
/
<a href="#" id="logout" class="my-nabvar-item">ログアウト</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<script>
    document.getElementById('logout').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    });
</script>

@else
<a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
/
<a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
@endif


<main>
    <h1>Flea Market</h1>
    <div class='container'>
        <form action={{ route("main.index") }} method="post">
            @csrf
            <div>
                <label for='name'>キーワード</label>
                <input type="text" class='form-control' name='keyward' value='keyward' />
            </div>
            <div>
                <label for='type'>価格</label>
                <select name='price' class='form-control'>
                    @foreach($price_list as $price)
                    <option value='' selected>{{ $price[0] }}~{{ $price[1] }}</option>
                    @endforeach
                    <option value=''>価格帯</option>
                </select>
            </div>
            <button type='submit' class='btn primary-btn'>検索</button>
        </form>
    </div>

    <h2>出品一覧</h2>
    @foreach($datalist as $data)
    <div>
        <h3>出品名：
            <a href="{{ route('detail.display', ['displayId' => $data['id']]) }}">{{ $data['name'] }}</a>
        </h3>
        <div>
            <img src="{{ asset( $data['image']) }}" width="400">
        </div>
        <label for='price'>{{ $data['price'] }}円</label>
        <a href="{{ route('detail.display', ['displayId' => $data['id']]) }}">詳細</a>
    </div>
    @endforeach

</main>









</main>

