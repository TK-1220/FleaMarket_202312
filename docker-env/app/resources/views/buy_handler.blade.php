<?php

?>

@extends('layouts.layout')
@section('content')


@if(!Auth::check())
<h2>ログイン後、購入が可能となります。</h2>
<a href="{{ route('login') }}">
    <button>ログインページへ</button>
</a>
@endif



<main>
    <h1>購入登録</h1>
    <form action="{{ route('main.handler', ['displayId' => $displayId]) }}" method='post'>
        @csrf
        <input type='hidden' name='user_id' value={{ Auth::user()->id }}>

        <label for="realname">名前</label>
        <input type="text" class='form-control' value=''>

        <label for="code">郵便番号</label>
        <input type="text" class='form-control' name='code' value=''>

        <label for='address'>住所</label>
        <input type="text" class='form-control' name='address' value=''>

        <label for='tel_number'>電話番号</label>
        <input type='text' class=form-control' name='tel' value=''>

        <button type='submit' class='btn'>購入</button>
    </form>
</main>


@endsection
