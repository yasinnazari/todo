<?

class UserModel {
       
    public static function insert($email, $hashedPassword, $firstname, $lastname, $time){
        $db = Db::getInstance();
        $db->insert("INSERT INTO user
            ( email,      password,        first_name,    last_name,    registerTime,  lastVisitTime) VALUES
            ('$email', '$hashedPassword', '$firstname', '$lastname',      '$time',        '$time')"
        );
    }

    public static function fetch_by_email($email){
        $db = Db::getInstance();
        return $db->first("SELECT * FROM user WHERE email='$email'");
    }

    public static function promoteUser($userId, $access)
    {
        $db= Db::getInstance();
        $db->modify("UPDATE user SET access='$access' WHERE user_id=$userId");
    }

    public static function getUserAccess($userId)
    {
        $db= Db::getInstance();
        $record = $db->first("SELECT access FROM user WHERE user_id=$userId");
        return $record['access'];
    }

}

