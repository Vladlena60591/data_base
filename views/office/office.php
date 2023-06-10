<?php include(ROOT . '/views/layouts/header.php'); ?>

<div class="container">
    <h2>Привет <?= $user['name'] ?></h2>
    <form action="" method="post">
        <div>
            <label>
                <div>Телефон</div>
                <input type="text" name="phone" pattern="[0-9]+"
                       value="<?= $user['phone'] ?>"></label>
        </div>
        <div>
            <label>
                <div>Электронная почта</div>
                <input type="email" name="email" value="<?= $user['email'] ?>"></label>
        </div>
        <div>
            <label>
                <div>Как к вам обращатся</div>
                <input type="text" name="username" value="<?= $user['name'] ?>"></label>
        </div>
        <input type="submit" name="edit" value="Сохранить изминения">
    </form>
    <? if (isset($user['is_admin']) && $user['is_admin']): ?>
        <a href="/cart/listOrder">Просмотреть заказы</a>
    <? endif; ?>
</div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
