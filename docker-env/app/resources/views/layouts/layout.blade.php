<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FleaMarket') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        @if(Auth::check() && Auth::user()->del_flg == 0)
        <span class="my-navbar-item">{{ Auth::user()->name }}</span>
        /
        <a href="{{ route('mypage.index', ['user_id' => Auth::user()->id]) }}" id='mypage'>マイページ</a>
        /
        <a href="#" id="logout" class="my-nabvar-item">ログアウト</a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <script>
            document.getElementById('logout').addEventListener('click', function(event) {
                event.preventDefault();
                document.getElementById('logout-form').submit();
            });
        </script>

        @else
        <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
        /
        <a class="my-navbar-item" href="{{ route('register') }}">会員登録</a>
        @endif

        /
        <a class="my-navbar-item" href="{{ route('main.index') }}">メインページ</a>

        @yield('content')
    </div>
</body>
</html>
