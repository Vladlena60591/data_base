<?php


class User
{
    /**
     * Проверяет валид имя: не меньше, чем 2 символа
     * @param string $name
     * @return bool
     */
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет валид email
     * @param string $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет телефон
     * @param string $userPhone
     * @return bool
     */
    public static function checkPhone($userPhone)
    {
        return true;
    }

    /**
     * Проверяет валид пароль: не меньше, чем 8 символов
     * @param string $password
     * @return bool
     */
    public static function checkPassword($password)
    {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }

    /**
     * Поиск пользователя в таблице по параметрам
     * @param string $email
     * @param string $password
     * @return int(user_id)/bool
     */
    public static function checkUserData($email, $password)
    {
        global $_DB;

        $sql = 'SELECT * '
            . 'FROM users '
            . 'WHERE email=(:email) AND password=(:password)';

        $result = $_DB->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
//        $tmp = md5($password);
        $tmp = $password;
        $result->bindParam(':password', $tmp, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }

        return false;
    }

    /**
     * Добавление в ссесию аутентификационого параметра
     * @param $userId
     */
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    /**
     * Проерка аутентификаци пользователя
     * @return int(аутентификационый параметр)
     */
    public static function checkLogger()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
        die();
    }

    /**
     * Является ли пользователь администратором?
     * @return bool
     */
    public static function isAdmin()
    {
        $id = self::checkLogger();
        global $_DB;
        $sql = 'SELECT is_admin FROM users WHERE id = :id';

        $result = $_DB->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        if ($result->fetch()['is_admin']) {
            return true;
        }
        header("Location: /office");
        die();
    }

    /**
     * Является ли пользователь гостем?
     * @return bool
     */
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    /**
     * Получение данных пользователя по id
     * @param int $id
     * @return mixed
     */
    public static function getUserById($id)
    {
        if ($id) {
            global $_DB;
            $sql = 'SELECT * FROM users WHERE id = :id';

            $result = $_DB->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
    }

}