@extends('layouts.layout')
@section('content')

<main>
    <div class="row justify-content-around">
        <h1>管理ページ</h1>
    </div>
    <div class="row justify-content-around">
        <a href="{{ route('admin.displays') }}">
            <button type='button' class='btn btn-primary'>出品管理</button>
        </a>
        <a href="{{ route('admin.users') }}">
            <button type='button' class='btn btn-primary'>ユーザー管理</button>
        </a>
    </div>
</main>

@endsection
