<?php


class Product
{
    /**
     * Возвращает список всех/в одной из категорий продуктов
     * @param int $categoryId
     * @return array
     */
    public static function getProductList($categoryId = false)
    {
        global $_DB;

        $productsList = array();

        if ($categoryId) {
            $sql = 'SELECT id, name, category_id , image, price, is_new'
                . ' FROM product '
                . ' WHERE status = "1" AND category_id = :category_id '
                . ' ORDER BY id ASC ';

            $result = $_DB->prepare($sql);
            $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
            $result->execute();

        } else {
            $result = $_DB->query('SELECT id, name, category_id , image, price, is_new'
                . ' FROM product'
                . ' WHERE status = "1"'
                . ' '
            );
        }
//        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $productsList[$i]['category_id'] = $row['category_id'];
            $productsList[$i]['image'] = $row['image'];
            $productsList[$i]['price'] = $row['price'];
            $productsList[$i]['is_new'] = $row['is_new'];
            $i++;
        }

        return $productsList;
    }

    /**
     * Возвращает список продуктов по требуемым id
     * @param array $idsArray
     * @return array
     */
    public static function getProductsByIds(array $idsArray)
    {
        $db = Db::getConnection();
        $products = array();

        $idsString = implode(',', $idsArray);

        $sql = 'SELECT * FROM product WHERE status=1 AND id IN (' . $idsString . ')';

        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $i = 0;
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['category_id'] = $row['category_id'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['brand'] = $row['brand'];
            $i++;
        }
        return $products;
    }
}