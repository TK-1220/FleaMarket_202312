<?php ?>
@extends('layouts.layout')
@section('content')

<main>
    @if(!isset($user_info->image))
    <img src="{{ asset('storage/img_icon/sample.png') }}" width="100" >
    @else
    <img src="{{ asset( $user_info->image) }}" width="100" >
    @endif

</main>
