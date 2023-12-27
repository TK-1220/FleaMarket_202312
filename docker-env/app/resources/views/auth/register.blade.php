{{-- @extends('layouts.layout')
@section('content') --}}

<main>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">ユーザー名</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"/>
        </div>
        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"/>
        </div>
        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" />
        </div>
        <div class="form-group">
            <label for="password-confirm">パスワード再入力</label>
            <input type="password" class="form-control" id="password-confirm" name="password_confirmation"/>
        </div>
        <button type="submit" class="btn btn-primary">登録</button>
    </form>
</main>

{{-- @endsection --}}
