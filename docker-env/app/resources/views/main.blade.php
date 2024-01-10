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
            <input type='hidden' name='display_id' value={{ $data->id }}>
        </div>
        <label for='price'>{{ $data['price'] }}円</label>
        <a href="{{ route('detail.display', ['displayId' => $data['id']]) }}">詳細</a>
        <a href="{{ route('main.handler', ['displayId' => $data['id']]) }}">
            <button type='button' class='btn btn-primary'>購入</button>
        </a>

        @if(Auth::check())
        @if($like_model->like_exist(Auth::user()->id, $data->id))
        <p class="favorite-marke">
            <a class="js-like-toggle loved" href="" data-displayid="{{ $data->id }}">💛<i class="fas fa-heart"></i></a>
            <span class="likesCount">{{$data->likes_count}}</span>
        </p>
        @else
        <p class="favorite-marke">
            <a class="js-like-toggle" href="" data-displayid="{{ $data->id }}">♡<i class="fas fa-heart"></i></a>
            <span class="likesCount">{{$data->likes_count}}</span>
        </p>
        @endif
        @endif
    </div>
    @endif
    @endforeach
</main>
@endsection

<style>
    .loved {
        color:red;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    $(function () {
        console.log('test');
        var like = $('.js-like-toggle');
        var likeDisplayId;

        like.on('click', function () {
            var $this = $(this);
            likeDisplayId = $this.data('displayid');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/ajaxlike',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'display_id': likeDisplayId //コントローラーに渡すパラメーター
                },
            })

            // Ajaxリクエストが成功した場合
            .done(function (data) {
                //lovedクラスを追加
                // $this.toggleClass('loved');
                console.log($this);
                if (data.exist == false) {
                    $this.text('♡');
                    // $this.css("color: #3490dc;");
                } else {
                    $this.text('💛');
                    // $this.removeClass('loved');
                    // $this.css("color: red;");
                }
                //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.displayLikesCount);

            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
                //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
                //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });

            return false;
        });
    });
</script>
