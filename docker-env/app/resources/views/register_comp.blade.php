<?php
$user_name = 'sample';
$email='sample@mail.com';
?>

<main>
    <h1>Complete New Registration</h1>
    <div>
        <label for="name"/>User Name:{{ $user_name }}</label>
    </div>
    <div>
        <label for="email"/>email address:{{ $email }}</label>
    </div>
    <a herf="{{ route('login') }}">
        <button class='btn'>return login page</button>
    </a>


</main>






