<?php

    class AdminController {

    public function __construct()
    {
        grantAdmin();
    }

    public function promoteUserForm()
    {
        View::render("/var/www/html/dev/workspace/web/todo/mvc/view/admin/promoteUser.php");
    }

    public function getUserAccess($userId)
    {
        $output['access'] = UserModel::getUserAccess($userId);
        echo json_encode($output);
    }

    public function promote()
    {
        $userId = $_POST['userId'];
        $access = $_POST['access'];
        $db = Db::getInstance();

        /*
            $accessArray = explode('-', $access);
            $newAccess = implode('|', $accessArray);
        */

        $access = "|" . str_replace(",", "|", $access) . "|";
        $access = str_replace(' ', '', $access);
        $access = str_replace("-", "|", $access);

        UserModel::promoteUser($userId, $access);
        ?> <div class="okms"> <? echo _ok_access; ?> </div> <?
    }
}
