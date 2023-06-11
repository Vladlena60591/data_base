<?php


class Category
{
    public static function getCategoriesList()
    {
        global $_DB;

        $categoryList = array();

        $result = $_DB->query('SELECT id, name'
            . ' FROM category'
            . ' WHERE status = 1'
            . ' ORDER BY sort_order ASC ');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }
    public static function getCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT *'
            . ' FROM category'
            . ' WHERE id=:id'
            . '';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetch();
    }
}