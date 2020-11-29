<?
class UserModel {
    public static function fetch_by_email(){
        $db = Db::getInstance();
        $db->query("SELECT * FROM user WHERE email");
    }
}