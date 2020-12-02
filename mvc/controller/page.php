<?

class PageController {

    public function home() {
        $isGuest = !isset($_SESSION['email']);

        if (!$isGuest){
            $user_id = $_SESSION['user_id'];
            $data['records'] = NoteModel::catalog($user_id);
        } else {
            $data['records'] = null;
        }

        $data['isGuest'] = $isGuest;
        View::render("/var/www/html/dev/workspace/web/todo/mvc/view/page/home.php", $data);
    }
}

