@extends('layouts.layout')
@section('content')

<main>
    @if(isset(Auth::user()->image))
    <img src="{{ asset(Auth::user()->image) }}" width="100" >
    @else
    <img src="{{ asset('storage/img_icon/sample.png') }}" width="100" >
    @endif

    <h2>フォローユーザー</h2>

    @foreach($follows as $follow)
        <div>
            @if(empty($user->image))
            <img src="{{ asset('storage/img_icon/sample.png') }}" width="100" >
            @else
            <img src="{{ asset( $follow->image) }}" width="100">
            @endif

            {{-- Check Point --}}
            <label>{{ $follow["name"] }}</label>
            <label name='profile'>{{ $follow['profile'] }}</label>

            <?php $displaylist = $displays::where('user_id', $follow['id'])->get();?>

            @if(!empty($displaylist))
            @foreach($displaylist as $display)
                <label name='dispalyName'>{{ $display->name }}</label>
                <img src="{{ asset($display->image) }}" width="200">
            @endforeach
            @endif
        </div>
    @endforeach
</main>
@endsection
