<?php

?>
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

<style>
    #preview {
        width: 20vw;
    }
    img {
        width: 100%;
    }
</style>


<main>
    <h1>マイページ編集</h1>
    <form action="{{ route('mypage.edit', ['user_id' => Auth::user()->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for='name'>ユーザー名</label>
            <input type='text' class='form-control' name='name' value="{{ Auth::user()->name }}" />
        </div>

        <div>
            <label for='email'>メールアドレス</label>
            <input type='text' class='form-control' name='email' value="{{ Auth::user()->email }}">
        </div>

        <div>
            <label for='comment'>プロフィール</label>
            <textarea class='form-control' name='profile'>{{ Auth::user()->profile }}</textarea>
        </div>

        <div>
            <input type="file" id="file" class='form-control' accept="image/png, image/jpeg" onchange="preview(this)" name="image">
            <div id="preview"></div>
        </div>

        <div>
            <button>編集完了</button>
        </div>

        <button>退会</button>
    </form>


</main>






