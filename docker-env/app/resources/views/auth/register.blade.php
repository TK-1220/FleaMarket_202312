{{-- @extends('layouts.layout')
@section('content') --}}

<main>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="user_name">ユーザー名</label>
            <input type="text" class="form-control" id="user_name" name="user_name" value="{{ old('user_name') }}"/>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"/>
        </div>
        <div class="form-group">
            <label for="passward">パスワード</label>
            <input type="text" class="form-control" id="passward" name="passward" value="{{ old('passward') }}"/>
        </div>
        <div class="form-group">
            <label for="passward">パスワード再入力</label>
            <input type="text" class="form-control" id="passward" name="passward" value="{{ old('passward') }}"/>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</main>

{{-- @endsection --}}
