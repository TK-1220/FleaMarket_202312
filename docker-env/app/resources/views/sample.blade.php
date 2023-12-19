<?php

?>

<main>
    <h1>sample page</h1>
    <form action={{ route("main.index") }} method="post">
        @csrf

        <label for="name">label name</label>
        <input type="text" class="form-control" id="name" name="name" value=''/>
        <button type='submit' class='btn'>button</button>
        <a href='#'>link</a>
        {{-- <a href="{{ route('create.category', ['info' => $subject]) }}">link</a> --}}
        <textarea class='form-control' name='comment'>comment comment message message</textarea>

    </form>

</main>






