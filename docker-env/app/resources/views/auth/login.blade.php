{{-- @extends('layouts.layout')

@section('content') --}}

<main>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_name">ユーザー名</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}" />
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input for="password" class="form-control" id="passward" name="password" />
        </div>
        <a href="#">パスワードを忘れた方はこちら</a>
        <button type="submit" class="btn btn-primary">ログイン</button>
    </form>

    <div>
        <a href="#">新規登録</a>
    </div>

</main>
{{-- @endsection --}}
