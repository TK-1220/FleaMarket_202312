<?php

price_list = [];

?>
{{-- @extends('layouts.layout')
@section('content') --}}

<main>
    {{-- search form --}}
    <form action={{route('home.index')}} method='post'>
        <input type='text' class='form-control' name='keyward' value=''/>
        <select>
        <button type='submit' class=btn btn-primary'>検索</button>
    </form>

    {{--display for buy list image and name  --}}

    {{-- @foreach( as )
        @if()
        display
        @else
        @endif
    @endforeach --}}

</main>



{{-- @endsection --}}
