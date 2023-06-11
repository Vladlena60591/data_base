<?php

class AdminController
{
    public function actionAdd()
    {
        $userId = User::checkLogger();
        $user = User::getUserById($userId);
        $categories = array();
        $categories = Category::getCategoriesList();
        $products = Product::getProductList(false);
        $productsInCart = Cart::getProducts();

        if (isset($user['is_admin']) && $user['is_admin']) {
            if (isset($_POST['create'])) {
                $name = $_POST['name'];
                $cat = (int)$_POST['categories'];
                $price = (int)$_POST['price'];
                $availability = (int)$_POST['availability'];
                $brand = $_POST['brand'];
                $description = $_POST['description'];
                if (isset($_FILES['image']) && $_FILES['image']['size'] != 0 && $file = fopen($_FILES['image']['tmp_name'], 'r+')) {
                    $ext = explode('.', $_FILES['image']['name']);
                    $filename = 'file_' . $ext[0] . '-' . rand(100000, 999999) . '.' . $ext[count($ext) - 1];
                    $resource = Container::getFileUploader()->store($file, $filename);
                    $image_url = $resource['ObjectURL'];
                } else
                    $image_url = '\template\image\null.png';
                if ($_POST['name'] != '' && Category::getCategoryById($cat) && $price > 0) {
                    if (!Product::createProduct($name, $cat, $price, $availability, $brand, $image_url, $description)) {
                        $_SESSION['messageAdd'] = 'Ошибка добавления к базе данных';
                    } else {
                        $_SESSION['messageAdd'] = 'Запись создана';
                    }
                } else {
                    $_SESSION['messageAdd'] = 'Ошибка в веденых данных';
                }
            }
            else{
                unset($_SESSION['messageAdd']);
            }
            require_once('views/admin/chocoAdd.php');
        }

        return true;
    }
}