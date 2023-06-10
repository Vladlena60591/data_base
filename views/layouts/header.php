<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choco Pastry</title>
    <link href="/template/css/bootstrap.min.css" rel="stylesheet">
    <link href="/template/css/header.css" rel="stylesheet">
    <link rel="stylesheet" href="/template/css/mian.css">
</head>
<body>
<div class="container header">
    <div class="row text-center">
        <div class="col-xs-12 col-sm-2 "><a href="/">Logo</a></div>
        <div class="col-xs-12 col-sm-2 ">ChocoPastry</div>

        <div class="col-xs-12 col-sm-8 ">
            <div class="pull-right">
                <ul class="nav navbar-nav">
                    <li><a href="/cart">
                            Корзина (<span id="cart-count"><?= Cart::countItem(); ?></span>)
                        </a></li>
                    <?php if (User::isGuest()): ?>
                        <li><a onclick="inlog()" href="/user/login"> Вход</a></li>
                    <?php else: ?>
                        <li><a href="/office"> Аккаунт</a></li>
                        <li><a onclick="outlog()" href="/user/logout"> Выход</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>



