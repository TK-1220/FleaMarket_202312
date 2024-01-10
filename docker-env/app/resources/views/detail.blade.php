<?php
// var_dump($user);
?>

@extends('layouts.layout')
@section('content')

<main>
    <h1>商品詳細</h1>

    <img src="{{ asset($dis_img) }}" name='display_img' width="500">

    <div>
        <h2>出品者</h2>

        <img src="{{ asset($icon_img) }}" name='icon_img' width="100">
        <a href="{{ route('profile.index', ['user_id' => $user['id']]) }}">
            <label name='user_name'>{{ $user['name'] }}</label>
        </a>
        <textarea name='profile'>{{ $user['profile'] }}</textarea>
    </div>

    <div>
        <label name='name'>商品名: {{ $data['name'] }}</label>
        <label name='price'>値段： {{ $data['price'] }} 円</label>
    </div>
    <label name='comment'>商品説明</label>
    <textarea name='comment'>{{ $data['comment'] }}</textarea>

    @if($data['user_id'] == Auth::user()->id)
        <a href="{{ route('edit.display', ['displayId' => $data['id']]) }}">編集</a>
    @else
    @endif

    <a href={{ $prevurl }}>
        <button class='btn'>戻る</button>
    </a>

    @endsection
</main>






