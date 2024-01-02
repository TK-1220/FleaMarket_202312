
<main>
    <h1>出品編集</h1>

    <form action="{{ route('edit.display', ['displayId' => $displayId]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type='hidden' name='prevurl' value={{ $prevurl }}>
        <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
        <div>
            <img src="{{ asset($display['image'] )}}" width="500">
        </div>

        <label name='name'>出品名</label>
        <input type='text' class='form-control' name='name' value={{ $display['name'] }} />

        <label name='price'>値段</label>
        <input type='text' class='form-control' name='price' value={{ $display['price'] }} />

        <div>
            <label name='status'>状態</label>
            <input type='type'>
        </div>

        <label name='description'>説明</label>
        <div>
            <textarea class='form-control' name='profile'>{{ $display['profile'] }}</textarea>
        </div>
        <button type='submit' class='btn btn-danger'>完了</button>
    </form>
    <a href="{{ route('delete.display', ['displayId' => $displayId]) }}">
        <button class='btn btn-danger'>削除</button>
    </a>

</main>





