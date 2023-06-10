<?php


class Order
{

    /**
     * Сохраняет заказ в базу данных
     * @param $userName
     * @param $userPhone
     * @param $userEmail
     * @param $userComments
     * @param $userId
     * @param $productsInCart
     * @return bool
     */
    public static function save($userName, $userPhone, $userEmail, $userComments, $userId, $productsInCart)
    {
        global $_DB;

        $sql = 'INSERT INTO product_order (user_name, user_phone , user_email, user_comment, user_id, products)'
            . ' VALUES (:userName, :userPhone, :userEmail, (:userComments), :userId, :product)';

        $result = $_DB->prepare($sql);

        $productsInCart = json_encode($productsInCart);
        $result->bindParam(':userName', $userName, PDO::PARAM_STR);
        $result->bindParam(':userPhone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
        $result->bindParam(':userComments', $userComments, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->bindParam(':product', $productsInCart, PDO::PARAM_STR);

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->execute();
    }

    /**
     * Возвращает список заказов из базы данных
     * @return array
     */
    public static function list()
    {
        global $_DB;
        $sql = 'SELECT * FROM product_order'
            . ' WHERE status = 1'
            . ' ORDER BY date';

        $result = $_DB->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result = $result->fetchAll();
        return $result;
    }

}