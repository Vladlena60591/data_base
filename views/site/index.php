<?php include(ROOT . '/views/layouts/header.php'); ?>

    <div class="container">
        <div class="bord row">
            <div class="category col-xs-12 col-sm-3">
                <h2 class="text-center">Категории</h2>
                <div class="table-bordered panel-bar">
                    <? foreach ($categories as $cat): ?>
                        <h4>
                            <a href="/<?= $cat['id'] ?>"><?= $cat['name'] ?></a>
                        </h4>
                    <? endforeach; ?>
                </div>
            </div>
            <div class="product col-xs-12 col-sm-9">
                <h2 class="text-center">Товары</h2>
                <div>
                    <? require_once('views/layouts/productTable.php') ?>
                </div>
            </div>
        </div>
    </div>

    <script src="/template/js/productTableUpdate.js"></script>

<?php include(ROOT . '/views/layouts/footer.php'); ?>