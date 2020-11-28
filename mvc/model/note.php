<?
class NoteModel {

    public static function insert($title, $description, $userId){
        $db = Db::getInstance();
        $db->insert("INSERT INTO note (title, description, user_id, isDone) VALUES ('$title', '$description', '$userId', false )");
    }
   
    public static function remove($noteId, $userId) {
        $db = Db::getInstance();
        $db->modify("DELETE FROM note WHERE note_id=$noteId AND user_id=$userId");
    }

    public static function toggle($noteId, $userId)
    {
        $db = Db::getInstance();
        $db->modify("UPDATE note SET isDone=Not isDone WHERE note_id=$noteId AND user_id=$userId");
    }

    public static function catalog($userId)
    {
        $db = Db::getInstance();
        return $db->query("SELECT * FROM note WHERE user_id=$userId");
    }

    public static function catalogByPage($userId, $startIndex, $count)
    {
        $db = Db::getInstance();
        return $db->query("SELECT * FROM note WHERE user_id=$userId LIMIT $startIndex, $count");
    }

    public static function countNotes($userId)
    {
        $db = Db::getInstance();
        $records = $db->query("SELECT COUNT (*) AS total FROM note WHERE user_id=$userId");
        return $records[0]['total'];
    }

}
