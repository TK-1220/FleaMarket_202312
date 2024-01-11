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
                    <th scope='col'>表示設定</th>
                </tr>
            </thead>
            <tbody>
                @foreach($displays as $display)
                <tr>
                    <form action={{ route('admin.displays') }} method='POST'>
                        @csrf
                        <th scope='col'><a href="{{ route('detail.display', ['displayId'=>$display['id']]) }}">{{ $display['id'] }}</a></th>
                        <th scope='col'>{{ $display['name'] }}</th>
                        <th scope='col'>{{ $display['price'] }}</th>
                        <th scope='col'>{{ $display['profile'] }}</th>
                        @if($display->del_flg == 0)
                        <th scope='col'><button  class='btn primary-btn'>表示</button></th>
                        @else
                        <th scope='col'><button class='btn primary-btn'>非表示</button></th>
                        @endif
                        <input type='hidden' name='id' value={{ $display->id }}>
                    </form>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</main>



@endsection
