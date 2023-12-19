<?php
$name = 'Test Test';
$mail = 'mail@mail.com';
?>

<main>
    <h1>Complete New Registration</h1>
        @csrf

        <label for="name">user name: {{ $name}} </label>
        <label for="name">mail address: {{ $mail}} </label>

        <button type='submit' class='btn'>button</button>
        <a href='{{ route('login') }}'>ログイン画面へ</a>
        {{-- <a href="{{ route('create.category', ['info' => $subject]) }}">link</a> --}}
        <textarea class='form-control' name='comment'>comment comment message message</textarea>



</main>






