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
    <h1>main page</h1>
    <div class='container'>
        <form action={{ route("main.index") }} method="post">
            @csrf
            <label for='name'>キーワード検索</label>
            <input type="text" class='form-control' name='keyward' value='keyward' />


            <label for='type'>価格</label>
            <select name='price' class='form-control'>
                @foreach($price_list as $price)
                <option value='' selected>{{ $price[0] }}~{{ $price[1] }}</option>
                @endforeach
                <option value=''>価格帯</option>
            </select>

            <button type='submit' class='btn primary-btn'>検索</button>
        </form>
    </div>

    <h2>出品一覧</h2>
    @foreach($datalist as $data)
    <img src="{{ asset('storage/' . $data['image']) }}">
    <h3>出品名：{{ $data['name'] }}</h3>
    <?php echo 'test001'; ?>
    <a href="{{ route('detail.display', ['displayId' => $data['id']]) }}">{{ $data['name'] }}</a>
    {{-- <a href="#">{{ $data['id'] }}</a> --}}
    <label for='price'>{{ $data['price'] }}円</label>
    @endforeach




</main>









</main>

