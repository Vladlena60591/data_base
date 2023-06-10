<?php include(ROOT . '/views/layouts/header.php'); ?>
    <div class="container">
        <? foreach ($orderList as $order): ?>
            Зарегестрирован?
            <?= $order['user_id'] ? 'да' : 'нет' ?>
            Кто
            <?= $order['user_name'] ?>
            Способ связи
            <?= $order['user_phone'] ?>

            <?= $order['user_email'] ?>
            Комментарии
            <?= $order['user_comment'] ?>
            Продукты
            <?= $order['products'] ?>
            <br>
        <? endforeach; ?>
    </div>
<?php include(ROOT . '/views/layouts/footer.php'); ?>

