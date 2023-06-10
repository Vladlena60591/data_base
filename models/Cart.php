<?php


class Cart
{

    /**
     * Считает количество упаковок товара в корзине
     * @return int
     */
    public static function countItem()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => [, $quantity]) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

    /**
     * Добавляет и устанавливает параметры товара в корзину
     * @param $id
     * @param $ves
     * @param $col
     * @return int
     */
    public static function setProduct($id, $ves, $col)
    {
        $id = intval($id);
        $ves = doubleval($ves);
        $col = intval($col);
        $productInCart = array();

        if (isset($_SESSION['products'])) {
            $productInCart = $_SESSION['products'];
        }

        if ($col == 0) {
            unset($productInCart[$id]);
        } else {
            $productInCart[$id] = array($ves, $col);
        }

        $_SESSION['products'] = $productInCart;

        return self::countItem();
    }

    /**
     * Возвращает список продуктов в корзине
     * @return bool|mixed
     */
    public static function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    /**
     * Считает суммарную стоимость пераданных продуктов
     * @param array $products
     * @return float
     */
    public static function getTotalPrice(array $products)
    {
        $productsInCart = self::getProducts();

        $total = 0;
        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']][1] * $productsInCart[$item['id']][0];
            }
        }
        return $total;
    }

    /**
     * Очищает корзину
     */
    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

}