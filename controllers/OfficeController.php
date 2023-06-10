<?php


class OfficeController
{

    public function actionIndex()
    {
        $userId = User::checkLogger();

        $user = User::getUserById($userId);

        require_once(ROOT . '/views/office/office.php');
        return true;
    }

}