<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
    <meta charset="UTF-8">
    <title>404 - Səhifə tapılmadı</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1"/>
    <style>
        html, body{
            height: 100%;
        }

        body{
            color: #333;
            margin: auto;
            padding: 1em;
            display: table;
            user-select: none;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        a{
            color: #3498db;
            text-decoration: none;
        }
        h1{
            margin-top: 0;
            font-size: 3.5em;
        }
        main{
            margin: 0 auto;
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .btn{
            color: #fff;
            padding: .75em 1em;
            background: #3498db;
            border-radius: 1.5em;
            display: inline-block;
            transition: opacity .3s, transform .3s;
        }
        .btn:hover{
            transform: scale(1.1);
        }
        .btn:active{
            opacity: .7;
        }
    </style>
</head>
<body>
<main>
    <h1>:(</h1>
    <p>Səhifə tapılmadı</p>
    <p>Bu Səhifə Mövcud Deyil və ya Silinib</p>
    <a class="btn" href="<?= site_url() ?>">Əsas Səhifə</a>
</main>
</body>
</html>