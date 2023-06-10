<?php


class UserController
{

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
        die();
    }

    public function actionLogin()
    {
        $email = '';
        $password = '';

        if (isset($_POST['log_in'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if (!User::checkEmail($email)) {
                $errors[] = 'Некорректный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль должен быть не короче 8 симовлов';
            }

            $userId = User::checkUserData($email, $password);

            if ($userId) {
                User::auth($userId);
                header("Location: /office/");
                die();
            } else {
                $errors[] = 'Неправильные данные для входа';
            }
        }

        require_once(ROOT . '/views/user/login.php');

        return true;
    }

}