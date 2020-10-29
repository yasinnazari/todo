<?

class NoteController {

    public function submit()
    {
        if (isset($_POST['title'])){
            $this->submitNote();
        } else {
            View::render("/note/submit.php");
        }
    }

    private function submitNote()
    {

        $title = post('title');
        $description = post('description');

        if (!isset($_SESSION['user_id'])){
            header("Location: /dev/workspace/web/shop/page/home");
            exit;
        }

        $userId = $_SESSION['user_id'];

        NoteModel::insert($title, $description, $userId);
        header("Location: /dev/workspace/web/shop/page/home");

    }

    public function remove($noteId)
    {

        if (!isset($_SESSION['user_id'])){
            exit;
        }

        $userId = $_SESSION['user_id'];

        NoteModel::remove($noteId, $userId);

        echo json_encode(array(
            'status' => true,
        ));
    }

    public function toggle($noteId)
    {
        if (!isset($_SESSION['user_id'])){
            exit;
        }

        $userId = $_SESSION['user_id'];

        NoteModel::toggle($noteId, $userId);

        echo json_encode(array(
            'status' => true,
        ));

    }

    public function catalog($pageIndex)
    {
        if (!isset($_SESSION['user_id'])){
            exit;
        }

        $isGuest = !isset($_SESSION['email']);

        $userId = $_SESSION['user_id'];

        $count = 10;
        $startIndex = ($pageIndex-1) * $count;
        $data['records'] = NoteModel::catalogByPage($userId, $startIndex, $count);
        $data['pageIndex'] = $pageIndex;

        View::render("/page/catalog.php", $data);
    }

    public function ajaxCatalog($pageIndex)
    {
        if (!isset($_SESSION['user_id'])){
            exit;
        }

        $isGuest = !isset($_SESSION['email']);

        $userId = $_SESSION['user_id'];

        $count = 10;
        $startIndex = ($pageIndex-1) * $count;
        $data['records'] = NoteModel::catalogByPage($userId, $startIndex, $count);
        $data['pageIndex'] = $pageIndex;

        ob_start();
            View::render("/page/ajaxCatalog.php", $projdata);
        $output = ob_get_clean();

        echo json_encode(array(
           'status' => true,
           'html' => $output,
        ));
    }

}

