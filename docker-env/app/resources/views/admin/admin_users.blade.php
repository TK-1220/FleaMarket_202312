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
                    <th scope='col'>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                @if($user->root == 1)
                <tr>
                    <th scope='col'><a href="{{ route('profile.index', ['user_id'=>$user['id']]) }}">{{ $user['id'] }}</a></th>
                    <th scope='col'>{{ $user['name'] }}</th>
                    <th scope='col'>{{ $user['email'] }}</th>
                    <th scope='col'>{{ $user['tel'] }}</th>
                    <th scope='col'>{{ $user['address'] }}</th>
                    <th scope='col'><a href="{{ route('admin.deleteUser', ['id'=>$user['id']]) }}">削除</a></th>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>


</main>


@endsection
