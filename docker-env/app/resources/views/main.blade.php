<?php
$price_list = [
    ['0', '1000'],
    ['1000', '2000'],
    ['2000', '3000'],
    ['3000', '4000'],
    ['4000', '5000'],
];
?>

<main>
    <h1>main page</h1>
    <form action={{ route("main.index") }} method="post">
        @csrf
        <label for='name'>Search keyward</label>
        <input type="text" class='form-control' name='keyward' value='keyward' />


        <label for='type'>price area</label>
        <select name='price' class='form-control'>
            <option value=''>価格帯</option>
            @foreach($price_list as $price)
                <option value='' selected>{{ $price[0] }}~{{ $price[1] }}</option>
            @endforeach
        </select>

        <button type='submit' class='btn'>検索</button>





</main>

