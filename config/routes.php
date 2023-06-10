<?php
return array(

    'cart/setAjax/([0-9]+)-([0-9]+[.]?[0-9]?)-([0-9]+)' => 'cart/setAjax/$1/$2/$3',
    'cart/listOrder'=>'cart/list',
    'cart' => 'cart/index',

    'office' => 'office/index',

    'user/logout' => 'user/logout',
    'user/login' => 'user/login',

    '([0-9]+)' => 'site/index/$1',
    '[^0-9]*' => 'site/index'
);