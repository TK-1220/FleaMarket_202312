<?php

?>

<main>
    <h1>User Infomation Edit</h1>
    <form action="{{ route('my.edit') }}" method="post">
        <div>
            <label for='name'>User Name</label>
            <input type='text' class='form-control' name='name' value=''>
        </div>

        <div>
            <label for='email'>email address</label>
            <input type='text' class='form-control' name='email' value=''>
        </div>

        <div>
            <label for='comment'>profile</label>
            <textarea class='form-control' name='comment'></textarea>
        </div>

        <div>
            {{-- <a herf="{{ route('maypage.main') }}"> --}}
            <a herf='#'>
                <button>edit complete</button>
            </a>
        </div>

        <button>退会</button>
    </form>


</main>






