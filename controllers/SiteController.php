<?php


class SiteController
{

    public function actionIndex($categoryId = false)
    {
        $categories = array();
        $categories = Category::getCategoriesList();
        $products = Product::getProductList($categoryId);
        $productsInCart = Cart::getProducts();

        $tmpcat = array();
        foreach ($categories as ['id' => $id, 'name' => $name]) {
            $tmpcat[$id] = $name;
        }
        foreach ($products as &$p) {
            $p['category'] = $tmpcat[$p['category_id']];
            if (isset($productsInCart[$p['id']])) {
                $p['ves'] = $productsInCart[$p['id']][0];
                $p['kol'] = $productsInCart[$p['id']][1];
            }
        }
        unset($p);
        require_once(ROOT . '/views/site/index.php');

        return true;
    }

}