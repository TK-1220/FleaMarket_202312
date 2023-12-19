<?php

?>
<style>
    div {
        width:50vw;
    }
    img {
        width:100%;
    }
</style>

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

<main>
    <h1>Registration Display</h1>

    <form action='#' method="post">
        @csrf
        <input type="file" accept="image/png, image/jpeg" onchange="preview(this)" name="image">
        <div id="preview"></div>

        <label name='display_name'>Display Name</label>
        <input type='text' class='form-control' value='' />

        <label name='price'>Price</label>
        <input type='text' class='form-control' value='' />

        <div>
            <label name='display_status'>display status</label>
            <input type='type'>
        </div>

        <label name='description'>Description for Display</label>
        <div>
            <textarea class='form-control' name='comment'></textarea>
        </div>

        <button type='submit'>Registration</button>
    </form>


 </main>






