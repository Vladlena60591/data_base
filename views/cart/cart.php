<?php include(ROOT . '/views/layouts/header.php'); ?>

    <div class="container">
        <div class="bord row">
            <div class="product col-xs-12 col-sm-12">
                <h2 class="text-center">Ваши Товары </h2>
                <div>
                    <? if (isset($result) && $result): ?>
                        <div class="text-center">
                            <p>Заказ принят в обработку. Мы вам перезвоним</p>
                            <a href="/">Продолжить покупки</a>
                        </div>
                    <? else: ?>
                        <? require_once('views/layouts/productTable.php') ?>
                        <div class="row">
                            <div class="pull-right col-sm-2 text-right">
                                <h4>Итого: <b id="result"><?= $totalPrice ?></b></h4>
                            </div>
                        </div>
                        <div>
                            <form action="" method="post">
                                <div>
                                    <label>
                                        <div>Телефон</div>
                                        <input type="text" name="phone" pattern="[0-9]+"
                                               value="<?= $userPhone ?>"></label>
                                </div>
                                <div>
                                    <label>
                                        <div>Электронная почта</div>
                                        <input type="email" name="email" value="<?= $userEmail ?>"></label>
                                </div>
                                <div>
                                    <label>
                                        <div>Как к вам обращатся</div>
                                        <input type="text" name="username" value="<?= $userName ?>"></label>
                                </div>
                                <div>
                                    <label>
                                        <div>Можете оставить комментарий к заказу</div>
                                        <textarea name="comments" id="" cols="30"
                                                  rows="3"><?= $userComments ?></textarea></label>
                                </div>
                                <input type="submit" name="orderAdd" value="Заказать">
                            </form>
                            <? if (isset($errors) && is_array($errors)): ?>
                                <div class="text-danger">
                                    <ul>
                                        <? foreach ($errors as $error): ?>
                                            <li><?= $error ?></li>
                                        <? endforeach; ?>
                                    </ul>
                                </div>
                            <? endif; ?>
                        </div>
                    <? endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="/template/js/productTableUpdate.js"></script>


<?php include(ROOT . '/views/layouts/footer.php'); ?>