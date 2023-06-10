<?php


class CartController
{

    public function actionSetAjax($id, $ves, $kol)
    {
        if ($id) {
            if ($ves <= 0) $ves = 0;
            if ($kol < 1) $kol = 0;

            echo Cart::setProduct($id, $ves, $kol);
        }
        return true;
    }

    public function actionList()
    {
        User::isAdmin();

        $orderList = Order::list();

        require_once(ROOT . '/views/cart/list.php');

        return true;
    }

    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();
        if ($productsInCart == false) {
            //Есть товары в корзине? - нет
            header('Location: /');
            die();
        }

        if (isset($_POST['orderAdd'])) {
            //Форма отправлена? - да
            $userName = $_POST['username'];
            $userPhone = $_POST['phone'];
            $userEmail = $_POST['email'];
            $userComments = $_POST['comments'];

            $errors = false;

            if (empty($userEmail) && empty($userPhone)) {
                $errors[] = 'Для связи с вами должен быть указан телефон или Emal';
            } elseif (empty($userEmail) && !empty($userPhone)) {
                if (!User::checkPhone($userPhone)) {
                    $errors[] = 'Неправильный телефон';
                }
            } elseif (!empty($userEmail) && empty($userPhone)) {
                if (!User::checkEmail($userEmail)) {
                    $errors[] = 'Неправильный email';
                }
            } else {
                if (!User::checkPhone($userPhone)) {
                    $errors[] = 'Неправильный телефон';
                }
                if (!User::checkEmail($userEmail)) {
                    $errors[] = 'Неправильный email';
                }
            }
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }

            if ($errors == false) {
                //Форма заполнена корректно? - да

                if (User::isGuest()) {
                    $userId = NULL;
                } else {
                    $userId = User::checkLogger();
                }
                $result = Order::save($userName, $userPhone, $userEmail, $userComments, $userId, $productsInCart);
                if ($result) {
                    Cart::clear();
                }
            } else {
                //Форма заполнена корректно? - нет

                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);

                $tmpcat = array();
                foreach ($categories as ['id' => $id, 'name' => $name]) {
                    $tmpcat[$id] = $name;
                }
                foreach ($products as &$p) {
                    $p['category'] = $tmpcat[$p['category_id']];
                    $p['ves'] = $productsInCart[$p['id']][0];
                    $p['kol'] = $productsInCart[$p['id']][1];;
                }
                unset($p);
            }
        } else {
            //Форма отправлена? - нет

            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);

            $tmpcat = array();
            foreach ($categories as ['id' => $id, 'name' => $name]) {
                $tmpcat[$id] = $name;
            }
            foreach ($products as &$p) {
                $p['category'] = $tmpcat[$p['category_id']];
                $p['ves'] = $productsInCart[$p['id']][0];
                $p['kol'] = $productsInCart[$p['id']][1];;
            }
            unset($p);

            $userName = false;
            $userPhone = false;
            $userEmail = false;
            $userComments = false;

            if (User::isGuest() == false) {
                $userId = User::checkLogger();
                $user = User::getUserById($userId);
                $userName = $user['name'];
                $userPhone = $user['phone'];
                $userEmail = $user['email'];
            }
        }
        require_once(ROOT . '/views/cart/cart.php');

        return true;
    }

}