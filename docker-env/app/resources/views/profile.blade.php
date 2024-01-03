

@extends('layouts.layout')
@section('content')
<main>
    <h1>プロフィール</h1>

    @if(!isset($user_info->image))
    <img src="{{ asset('storage/img_icon/sample.png') }}" width="100" >
    @else
    <img src="{{ asset( $user_info->image) }}" width="100" >
    @endif


    <form action="{{ route('profile.index',
     ['user_id' => $user_info->id, 'my_id' => Auth::user()->id]) }}" method='post'>
        @csrf
        <div class='container'>
            <label>ユーザー名</label>
            <label for='user_name'>{{ $user_info->name }}</label>

            @if(empty($follows->where('follow_id', $user_info->id)))
                <button type='submit' class='btn'>フォロー</button>
            @else
                <p>フォロー済</p>
            @endif

        </div>
        <label for='profile'>{{ $user_info->profile }}</label>
    </form>

    <div>
        <h2>出品一覧</h2>
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

    <a href={{ $prevurl }}>
        <button class='btn'>前に戻る</button>
    </a>


</main>

@endsection
