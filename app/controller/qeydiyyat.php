<?php

    $meta = [
        'title' => setting('title'),
        'description' => setting('description'),
        'keywords' => setting('keywords'),
        'author' => setting('author')
    ];

    require view('index');

?>