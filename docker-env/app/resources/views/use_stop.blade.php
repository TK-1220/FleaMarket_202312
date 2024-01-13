
<main>
    <h1>利用停止中</h1>

    {{-- <a href='{{ route('login') }}'>ログイン画面へ</a> --}}
    <a href="#" id="logout" class="my-nabvar-item">メインページへ</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    <script>
        document.getElementById('logout').addEventListener('click', function(event) {
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>


</main>






