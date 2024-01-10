@extends('layouts.layout')
@section('content')


<main>
    <div class="card-body">
        <table class='table'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>出品名</th>
                    <th scope='col'>金額</th>
                    <th scope='col'>説明</th>
                    <th scope='col'>削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach($displays as $display)
                <tr>
                    <th scope='col'><a href="{{ route('detail.display', ['displayId'=>$display['id']]) }}">{{ $display['id'] }}</a></th>
                    <th scope='col'>{{ $display['name'] }}</th>
                    <th scope='col'>{{ $display['price'] }}</th>
                    <th scope='col'>{{ $display['profile'] }}</th>
                    <th scope='col'><a href="{{ route('admin.deleteDisplay', ['id'=>$display['id']]) }}">削除</a></th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</main>



@endsection
