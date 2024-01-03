<?php

?>

@extends('layouts.layout')
@section('content')
<style>
    div {
        width:50vw;
    }
    img {
        width:100%;
    }
</style>

<script>
    function preview(o) {
        const preview = document.getElementById('preview');
        const fileReader = new FileReader();
        fileReader.onload = (function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            preview.appendChild(img);
        });
        fileReader.readAsDataURL(o.files[0]);
    }
</script>

<main>
    <h1>出品登録</h1>

    <form action="{{ route('register.display') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">

        <div>
            <input type="file" id="file" class='form-control' accept="image/png, image/jpeg" onchange="preview(this)" name="image">
            <div id="preview"></div>
        </div>

        <label name='name'>出品名</label>
        <input type='text' class='form-control' name='name' value='' />

        <label name='price'>値段</label>
        <input type='text' class='form-control' name='price' value='' />

        <div>
            <label name='status'>出品商品の状態</label>
            <input type='type'>
        </div>

        <label name='description'>出品の説明</label>
        <div>
            <textarea class='form-control' name='profile'></textarea>
        </div>

        <button type='submit' class='btn btn-danger'>出品登録</button>
    </form>


</main>

@endsection
