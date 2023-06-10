<div class="row bottom">
    <div class="col-xs-6 col-sm-2">Наименование</div>
    <div class="col-xs-6 col-sm-2">Категория</div>
    <div class="col-xs-6 col-sm-2 text-center">Вес упаковки</div>
    <div class="col-xs-6 col-sm-2 text-center">Кол-во упаковок</div>
    <div class="col-xs-6 col-sm-2 text-right">Цена, кг/руб</div>
    <div class="col-xs-6 col-sm-2 text-right">Сумма, руб.</div>
</div>
<?php if(isset($products)):?>
<? foreach ($products as $product): ?>
    <div class="row " style="margin-bottom: 10px">
        <div class="col-xs-6 col-sm-2"><?= $product['name'] ?></div>
        <div class="col-xs-6 col-sm-2"><?= $product['category'] ?></div>

        <div class="col-xs-6 col-sm-2"
             id="ves<?= $product['id'] ?>">
            <input class="form-control" onchange="inchangeVes(<?= $product['id'] ?>)"
                   type="number" value=<?= isset($product['ves']) ? $product['ves'] : 0 ?> min="0" step="0.5"></div>
        <div class="col-xs-6 col-sm-2"
             id="kol<?= $product['id'] ?>">
            <input class="form-control" onchange="inchangeKol(<?= $product['id'] ?>)"
                   type="number" value=<?= isset($product['kol']) ? $product['kol'] : 0 ?> min="0"></div>

        <div class="col-xs-6 col-sm-2 text-right"
             id="prise<?= $product['id'] ?>"><?= $product['price'] ?></div>
        <div class="col-xs-6 col-sm-2 text-right"
             id="sum<?= $product['id'] ?>"><?= isset($product['kol']) && isset($product['ves']) ? $product['ves'] * $product['kol'] * $product['price'] : 0 ?></div>
    </div>
<? endforeach; ?>
<?php endif;?>
