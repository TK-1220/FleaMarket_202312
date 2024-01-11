@extends('layouts.layout')
@section('content')



<main>
    <div class="card-body">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>ユーザー名</th>
                    <th scope='col'>メールアドレス</th>
                    <th scope='col'>電話番号</th>
                    <th scope='col'>住所</th>
                    <th scope='col'>利用状況</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->root == 1)
                <tr>
                    <form action={{ route('admin.users') }} method="POST">
                        @csrf
                        <th scope='col'><a href="{{ route('profile.index', ['user_id'=>$user['id']]) }}">{{ $user['id'] }}</a></th>
                        <th scope='col'>{{ $user['name'] }}</th>
                        <th scope='col'>{{ $user['email'] }}</th>
                        <th scope='col'>{{ $user['tel'] }}</th>
                        <th scope='col'>{{ $user['address'] }}</th>
                        @if($user->del_flg == 0)
                        <th scope='col'><button  class='btn primary-btn'>利用停止</button></th>
                        @else
                        <th scope='col'><button class='btn primary-btn'>利用停止中</button></th>
                        @endif
                        <input type='hidden' name='id' value={{ $user->id }}>
                    </form>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>


</main>


@endsection
